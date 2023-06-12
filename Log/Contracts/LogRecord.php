<?php declare(strict_types=1);

namespace Core\Log\Contracts;

/**
 * Interface for standardising log record created by logger and
 * subsequently used by processors, handlers and formatters.
*/
interface LogRecord
{
    // TODO add custom datetime contract
    public function __construct(
        string $channel,
        LogLevel $level,
        string $message,
        array $context,
        array $extra
    );
}