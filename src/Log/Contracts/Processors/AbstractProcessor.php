<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebCore\Log\Contracts\Processors;

use WebCore\Log\Contracts\LogRecord;

/**
 * Abstract class providing default implementations
 * of methods defined in the Processor interface, making
 * it easier to extend and create custom Processors.
 */
abstract class AbstractProcessor implements Processor
{
    /**
     * {@inheritDoc}
     */
    final public function processBatch(LogRecord ...$records): array
    {
        foreach ($records as $key => $record) {
            $records[$key] = $this->process($record);
        }

        return $records;
    }
}
