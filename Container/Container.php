<?php

declare(strict_types=1);

namespace App\Core;

use App\Enums\ContainerItemType;
use App\Exceptions\Container\ContainerItemClosureException;
use Psr\Container\ContainerInterface;
use App\Exceptions\Container\ContainerNotFoundException;
use App\Exceptions\Container\ContainerDuplicateException;
use App\Exceptions\Container\ContainerResolveException;
use App\Exceptions\Container\ContainerResolveDependencyException;
use App\Exceptions\Container\ContainerItemInstanceException;
use App\Exceptions\Container\ContainerItemTypeException;

class Container implements ContainerInterface
{
    // array of ContainerItem-s
    private array $items = [];

    public function get(string $id): mixed
    {
        if ($this->has($id)) {
            if ($this->items[$id]->is_instantiable()) {
                return $this->items[$id]->get_instance($this);
            } else {
                $id = $this->items[$id]->get_class();
            }
        }
        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset($this->items[$id]);
    }

    public function bind(string $id, \Closure|string $concrete): void
    {
        if ($concrete instanceof \Closure) {
            $this->set(new ContainerItem($id, $concrete, ContainerItemType::BIND));
        }
        // FEAT: refactor interfaces & this method
        else {
            $this->set(new ContainerItem($id, null, ContainerItemType::INTERFACE, $concrete));
        }
    }

    public function singleton(string $id, \Closure $concrete): void
    {
        $this->set(new ContainerItem($id, $concrete, ContainerItemType::SINGLETON));
    }

    public function instance(string $id, mixed $instance): void
    {
        $this->set(new ContainerItem($id, null, ContainerItemType::INSTANCE, $instance));
    }

    private function set(ContainerItem $item): void
    {
        if ($this->has($item->get_id())) {
            throw new ContainerDuplicateException("Container item '$item->id' already exists");
        }
        $this->items[$item->get_id()] = $item;
    }

    private function resolve(string $id): mixed
    {
        // 1. inspect the class we are trying to get from the container
        $class_reflection = new \ReflectionClass($id);
        if (!$class_reflection->isInstantiable()) {
            throw new ContainerResolveException("Class $id is not instantiable.");
        }

        // 2. Inspect the constructor of the class
        $class_constructor = $class_reflection->getConstructor();
        if ($class_constructor === null) {
            return new $id();
        }

        // 3. Inspect the constructor parameters (dependencies)
        $parameters = $class_constructor->getParameters();
        if ($parameters === null) {
            return new $id();
        }

        // 4. Try to resolve class dependencies
        $resolved_dependencies = $this->resolve_dependencies($parameters, $id);

        // 5. Return instance of $id
        return $class_reflection->newInstanceArgs($resolved_dependencies);
    }

    private function resolve_dependencies(array $dependencies, string $class_name): array
    {
        return array_map(function (\ReflectionParameter $dep) use ($class_name) {
            $name = $dep->getName();
            $type = $dep->getType();

            if ($type === null) {
                throw new ContainerResolveDependencyException(
                    "Parameter $name of class $class_name doesn't have a type.",
                );
            }

            if ($type instanceof \ReflectionUnionType || $type instanceof \ReflectionIntersectionType) {
                throw new ContainerResolveDependencyException(
                    "Parameter $name of class $class_name is union/intersection of multiple types.",
                );
            }

            if ($type->isBuiltin()) {
                throw new ContainerResolveDependencyException(
                    "Parameter $name of class $class_name is of builtin type.",
                );
            }

            if ($type instanceof \ReflectionNamedType) {
                return $this->get($type->getName());
            }

            throw new ContainerResolveDependencyException("Parameter $name of class $class_name is invalid.");
        }, $dependencies);
    }
}

class ContainerItem
{
    public function __construct(
        private string $id,
        private \Closure|null $concrete,
        private ContainerItemType $type,
        private mixed $instance = null,
    ) {
        if ($concrete === null && $type !== ContainerItemType::INSTANCE) {
            throw new ContainerItemClosureException("Closure of item '$id' with type '{$type->name}' is null");
        }
    }

    public function get_id(): string
    {
        return $this->id;
    }

    public function is_instantiable(): bool
    {
        return $this->concrete !== null || $this->type === ContainerItemType::INSTANCE;
    }

    public function get_instance(Container $c): mixed
    {
        switch ($this->type) {
            case ContainerItemType::BIND:
                return $this->valid_instance(($this->concrete)($c));

            case ContainerItemType::SINGLETON:
                return $this->valid_instance($this->instance ?? ($this->instance = ($this->concrete)($c)));

            case ContainerItemType::INSTANCE:
                return $this->valid_instance($this->instance);

            default:
                throw new ContainerItemTypeException(
                    "Item '$this->id' of type '{$this->type->name}' is not instantiable",
                );
        }
    }

    public function get_class(): string
    {
        if (is_string($this->instance) && $this->type === ContainerItemType::INTERFACE) {
            return $this->instance;
        }
        throw new ContainerItemTypeException(
            "Item '$this->id' of type '{$this->type->name}' doesn't have a class name",
        );
    }

    private function valid_instance(mixed $instance): mixed
    {
        if ($instance === null) {
            throw new ContainerItemInstanceException(
                "Item instance of '$this->id' of type '{$this->type->name}' is null",
            );
        }

        return $instance;
    }
}
