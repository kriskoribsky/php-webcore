<?php declare(strict_types=1);

namespace Core\Log\Contracts\Formatters;

use Core\Log\Contracts\LogRecord;

/**
 * Abstract class providing default implementations
 * of methods defined in the Formatter interface, making
 * it easier to extend and create custom Formatters.
 */
abstract class AbstracFormatter implements Formatter
{
    /**
     * @inheritDoc
     */
    public function formatBatch(LogRecord ...$records): array
    {
        foreach ($records as $key => $record) {
            $records[$key] = $this->format($record);
        }

        return $records;
    }
}
