<?php declare(strict_types=1);

// TODO update namespaces after deprecating Contracts/ folder

namespace Core\Log;

use Core\Contracts\Log\Logger as LoggerContract;
use Core\Contracts\Log\AbstractLogger;
use Core\Contracts\Log\LogLevel;

final class Logger extends AbstractLogger implements LoggerContract
{
    private \Closure $formatter;

    public function __construct(callable $formatter)
    {
        $this->formatter = $formatter(...);
    }

    public function log(mixed $level, string|\Stringable $message, array $context = []): void
    {
        if (!isset(self::LEVELS[$level])) {
            throw new \InvalidArgumentException("The log level '{$level}' does not exist");
        }
    }
}