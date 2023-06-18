<?php declare(strict_types=1);

namespace App\Core;

use App\Exceptions\Router\RouteNotFoundException;

class Router
{
    public array $routes = [];

    public function register_static(string $path, string $controller, string $method): void
    {
        $this->routes[$path] = new Route($controller, $method);
    }

    public function register_dynamic(string $pattern, string $controller, string $method): void
    {
        $this->routes[$pattern] = new Route($controller, $method, static: false);
    }

    public function resolve(Request $request, Container $container): string
    {
        // remove query string & tailing '/'
        $path = rtrim(explode('?', $request->get_uri())[0], '/');

        // try to resolve static routes first
        if (isset($this->routes[$path]) && $this->routes[$path]->is_static()) {
            return $this->routes[$path]->execute($container);
        }

        // dynamic routes get passed method arguments
        foreach ($this->routes as $pattern => $route) {
            if (preg_match($pattern, $path)) {
                $args = array_slice(explode('/', $path), 2);

                $route->addArgs($args);
                return $route->execute($container);
            }
        }
        throw new RouteNotFoundException("Route '{$request->get_uri()}' not found");
    }
}

class Route
{
    public function __construct(
        private string $controller,
        private string $method,
        private array $args = [],
        private bool $static = true,
    ) {
    }

    public function is_static(): bool
    {
        return $this->static;
    }

    public function execute(Container $container): string
    {
        $controller_instance = $container->get($this->controller);
        $method = $this->method;
        $args = $this->args;

        return $controller_instance->$method(...$args);
    }

    public function addArgs(array $args): void
    {
        $this->args = $args;
    }
}
