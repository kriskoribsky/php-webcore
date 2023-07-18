<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebCore\Log\Contracts\Handlers;

use WebCore\Log\Contracts\LogLevel;
use WebCore\Log\Contracts\LogRecord;

/**
 * Abstract class providing default implementations
 * of methods defined in the Handler interface, making
 * it easier to extend and create custom Handlers.
 */
abstract class AbstractHandler implements Handler
{
    private LogLevel $level;

    public function __construct(mixed $level)
    {
        $this->setLevel($level);
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

    /**
     * {@inheritDoc}
     */
    final public function setLevel(mixed $level): self
    {
        $this->level = LogLevel::fromMixed($level);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    final public function getLevel(): LogLevel
    {
        return $this->level;
    }

    /**
     * {@inheritDoc}
     */
    final public function handlesLevel(LogRecord $record): bool
    {
        return $this->level->includes($record->level);
    }

    /**
     * {@inheritDoc}
     */
    final public function handleBatch(LogRecord ...$records): bool
    {
        $allSucess = true;

        foreach ($records as $record) {
            if ($this->handle($record) === false) {
                $allSucess = false;
            }
        }

        return $allSucess;
    }
}
