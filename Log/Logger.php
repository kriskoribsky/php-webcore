<?php declare(strict_types=1);

namespace App\Core\Log;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class Logger extends AbstractLogger implements LoggerInterface
{
    public function __construct(public readonly string $id)
    {
    }

    public function log($level, string|\Stringable $message, array $context = []): void
    {
        $level = LogLevel::tryFrom($level) ?? throw 
    }
}