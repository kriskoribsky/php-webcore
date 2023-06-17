<?php declare(strict_types=1);

namespace Core\Log\Contracts\Processors;

use Core\Log\Contracts\LogRecord;

/**
 * Abstract class providing default implementations
 * of methods defined in the Processor interface, making
 * it easier to extend and create custom Processors.
 */
abstract class AbstractProcessor implements Processor
{
    /**
     * @inheritDoc
     */
    public function processBatch(LogRecord ...$records): array
    {
        foreach ($records as $key => $record) {
            $records[$key] = $this->process($record);
        }

        return $records;
    }
}
