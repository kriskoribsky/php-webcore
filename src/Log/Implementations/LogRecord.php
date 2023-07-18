<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebCore\Log\Implementations;

use WebCore\Log\Contracts\LogLevel;
use WebCore\Log\Contracts\LogRecord as LogRecordContract;

final class LogRecord implements LogRecordContract
{
    public function __construct(
        public readonly string $channel,
        public readonly LogLevel $level,
        public readonly string $message,
        public readonly array $context,
        public readonly array $extra,
    ) {}
}
