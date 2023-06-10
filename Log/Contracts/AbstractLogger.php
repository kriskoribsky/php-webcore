<?php declare(strict_types=1);

namespace Core\Contracts\Log;

use Psr\Log\LoggerTrait;

/**
 * This is a simple Logger implementation taken from Psr\Log\AbstractLogger.
 *
 * It simply delegates all log-level-specific methods to the `log` method to
 * reduce boilerplate code that a simple Logger that does the same thing with
 * messages regardless of the error level has to implement.
 */
abstract class AbstractLogger implements Logger
{
    use LoggerTrait;
}