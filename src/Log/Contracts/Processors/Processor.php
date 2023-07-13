<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebCore\Log\Contracts\Processors;

use WebCore\Log\Contracts\LogRecord;

/**
 * Interface that all Processors must implement.
 */
interface Processor
{
    /**
     * Process a record.
     *
     * Processing a record means adding additional data
     * to the extra' context of the record.
     *
     * @param LogRecord $record the record to process
     *
     * @return LogRecord processed record
     */
    public function process(LogRecord $record): LogRecord;

    /**
     * Processes a set of records at once.
     *
     * @param LogRecord $records records to handle
     *
     * @return array<LogRecord> processed records
     */
    public function processBatch(LogRecord ...$records): array;
}
