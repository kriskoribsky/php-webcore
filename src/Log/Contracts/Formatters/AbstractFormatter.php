<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebCore\Log\Contracts\Formatters;

use WebCore\Log\Contracts\LogRecord;

/**
 * Abstract class providing default implementations
 * of methods defined in the Formatter interface, making
 * it easier to extend and create custom Formatters.
 */
abstract class AbstractFormatter implements Formatter
{
    /**
     * {@inheritDoc}
     */
    final public function formatBatch(LogRecord ...$records): array
    {
        foreach ($records as $key => $record) {
            $records[$key] = $this->format($record);
        }

        return $records;
    }
}
