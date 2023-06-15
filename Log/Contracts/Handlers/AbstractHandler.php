<?php declare(strict_types=1);

namespace Core\Log\Contracts\Handlers;

use Core\Log\Contracts\LogRecord;
use Core\Log\Contracts\LogLevel;

/**
 * Abstract class providing default implementations
 * of some methods defined in the Handler interface,
 * making it easier to extend and create custom Handlers.
 */
abstract class AbstractHandler implements Handler
{
    private LogLevel $level;

    public function __construct(mixed $level)
    {
        $this->setLevel($level);
    }

    /**
     * @inheritDoc
     */
    public function setLevel(mixed $level): self
    {
        $this->level = LogLevel::fromMixed($level);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getLevel(): LogLevel
    {
        return $this->level;
    }

    /**
     * @inheritdoc
     */
    public function handlesLevel(LogRecord $record): bool
    {
        return $this->level->includes($record->level);
    }

    /**
     * @inheritDoc
     */
    public function handleBatch(LogRecord ...$records): bool
    {
        $allSucess = true;

        foreach ($records as $record) {
            if ($this->handle($record) === false) {
                $allSucess = false;
            }
        }

        return $allSucess;
    }

    /**
     * Destructor that automatically calls the close method.
     *
     * @throws \Throwable any exception or error that occurs during the close operation
     */
    public function __destruct()
    {
        $this->close();
    }
}
