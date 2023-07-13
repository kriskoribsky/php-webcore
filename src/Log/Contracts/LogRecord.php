<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebCore\Log\Contracts;

/**
 * Interface for standardising log record created by logger and
 * subsequently used by processors, handlers and formatters.
 */
interface LogRecord
{
    // FEAT add time-stamp property
    public function __construct(string $channel, LogLevel $level, string $message, array $context, array $extra);
}
