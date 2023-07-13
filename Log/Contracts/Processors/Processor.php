<?php declare(strict_types=1);

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
     * @return LogRecord processed record
     */
    public function process(LogRecord $record): LogRecord;

    /**
     * Processes a set of records at once.
     *
     * @param LogRecord $records records to handle
     * @return array<LogRecord> processed records
     */
    public function processBatch(LogRecord ...$records): array;
}
