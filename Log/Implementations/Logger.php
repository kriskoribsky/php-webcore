<?php declare(strict_types=1);

namespace Core\Log\Implementations;

use Core\Log\Contracts\Logger as LoggerContract;
use Core\Log\Contracts\LogLevel;
use Core\Log\Exceptions\InvalidArgumentException;

use Psr\Log\LoggerTrait;

// TODO configure prettier
final class Logger implements LoggerContract
{
  use LoggerTrait;

  private array $processors;
  private array $handlers;

  public function __construct(private string $name)
  {
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function withName(string $name): self
  {
    $new = clone $this;
    $new->name = $name;

    return $new;
  }

  public function log(mixed $level, string|\Stringable $message, array $context = []): void
  {
    try {
      if (is_int($level)) {
        $level = LogLevel::fromValue($level);
      } elseif (is_string($level)) {
        $level = LogLevel::fromName($level);
      } elseif (!($level instanceof LogLevel)) {
        throw new InvalidArgumentException("'{$level}' is expected to be a string, int or " . LogLevel::class . ' instance)');
      }
    } catch (\UnhandledMatchError) {
      throw new InvalidArgumentException("'{$level}' is unsuported enum value");
    }
  }

  public function pushProcessor(callable $processor): self
  {
    array_unshift($this->processors, $processor);

    return $this;
  }

  public function popProcessor(): callable
  {
    // TODO use custom exception here when later created
    if (\count($this->processors) === 0) {
      throw new \LogicException('You tried to pop from an empty processor stack.');
    }

    return array_shift($this->processors);
  }

  public function setProcessors(callable ...$processors): self
  {
    $this->processors = $processors;

    return $this;
  }

  public function getProcessors(): array
  {
    return $this->processors;
  }
}
