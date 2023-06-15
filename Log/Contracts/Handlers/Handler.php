<?php declare(strict_types=1);

namespace Core\Log\Contracts\Handlers;

use Core\Log\Contracts\LogLevel;
use Core\Log\Contracts\LogRecord;

/**
 * Interface that all Handlers must implement.
 */
interface Handler
{
    /**
     * Sets minimum logging level at which this handler will be triggered.
     *
     * @param mixed $level the logging level to set
     * @return self Returns the handler instance for method chaining
     * @throws \Core\Log\Exceptions\InvalidArgumentException if the level is invalid or not supported
     */
    public function setLevel(mixed $level): self;

    /**
     * Gets minimum logging level at which this handler will be triggered.
     *
     * @return LogLevel the logging level of the handler
     */
    public function getLevel(): LogLevel;

    /**
     * Checks whether the given record will be handled by this handler.
     *
     * This is mostly done for performance reasons, to avoid calling handler for nothing.
     * Handlers should still check the record levels within handle().
     *
     * @param LogRecord $record the log record to check
     * @return bool true if the handler can handle the log record, false otherwise
     */
    public function handlesLevel(LogRecord $record): bool;

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
     *
     * This is useful at the end of a request and will be called automatically when the object
     * is destroyed if you extend Core\Log\Contracts\Handlers\AbstractHandler.
     */
    public function close(): void;
}
