<?php declare(strict_types=1);

namespace Core\Log\Implementations;

use Core\Log\Contracts\LogRecord as LogRecordContract;
use Core\Log\Contracts\LogLevel;

class LogRecord implements LogRecordContract
{
    public function __construct(
        public readonly string $channel,
        public readonly LogLevel $level,
        public readonly string $message,
        public readonly array $context,
        public array $extra,
    ) {
    }
}
