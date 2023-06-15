<?php declare(strict_types=1);

namespace Core\Log\Contracts\Handlers;

use Core\Log\Contracts\LogRecord;

/**
 * Interface that all Handlers must implement.
 */
interface Handler
{
    /**
     * Handles a record.
     *
     * All records may be passed to this method, the handler should discard
     * those records which are below handler's logging level.
     *
     * @param LogRecord $record the record to handle
     * @return bool true if the record was handled successfully, false otherwise
     */
    public function handle(LogRecord $record): bool;

    /**
     * Handles a set of records at once.

     * @param LogRecord $records records to handle
     * @return bool true if all records were handled successfully, false otherwise
     */
    public function handleBatch(LogRecord ...$records): bool;

    /**
     * Closes the handler.
     *
     * Ends a log cycle and frees all resources used by the handler.
     * Closing a Handler menas flushing all buffers and freeing any open resources/handles.
     */
    public function close(): void;
}
