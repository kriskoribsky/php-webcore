<?php declare(strict_types=1);

namespace Core\Log\Contracts\Formatters;

use Core\Log\Contracts\LogRecord;

/**
 * Interface that all Formatters must implement.
 */
interface Formatter
{
    /**
     * Formats a log record.
     *
     * Formatting a record means normalizing and formatting incoming records
     * so that they can be used by the handlers to ouput useful information.
     *
     * @param LogRecord $record the record to format
     * @return LogRecord the formatted record
     */
    public function format(LogRecord $record): LogRecord;

    /**
     * Formats a set of records at once.
     *
     * @param LogRecord $records records to format
     * @return array<LogRecord> formatted records
     */
    public function formatBatch(LogRecord ...$records): array;
}
