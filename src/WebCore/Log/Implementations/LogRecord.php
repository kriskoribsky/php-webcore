<?php declare(strict_types=1);

namespace WebCore\Log\Implementations;

use WebCore\Log\Contracts\LogRecord as LogRecordContract;
use WebCore\Log\Contracts\LogLevel;

final class LogRecord implements LogRecordContract
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
