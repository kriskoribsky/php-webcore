<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebCore\Log\Implementations;

use Psr\Log\LogLevel as LogLevelPsr;
use WebCore\Log\Contracts\LogLevel as LogLevelContract;
use WebCore\Log\Exceptions\InvalidArgumentException;

enum LogLevel: int implements LogLevelContract
{
    /**
     * Urgent alert.
     */
    case EMERGENCY = 600;

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc.
     * This should trigger the SMS alerts and wake you up.
     */
    case ALERT = 550;

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     */
    case CRITICAL = 500;

    /**
     * Runtime errors.
     */
    case ERROR = 400;

    /**
     * Exceptional occurrences that are not errors.
     *
     * Examples: Use of deprecated APIs, poor use of an API,
     * undesirable things that are not necessarily wrong.
     */
    case WARNING = 300;

    /**
     * Uncommon events.
     */
    case NOTICE = 250;

    /**
     * Interesting events.
     *
     * Examples: User logs in, SQL logs.
     */
    case INFO = 200;

    /**
     * Detailed debug information.
     */
    case DEBUG = 100;

    /**
     * Mapping of Framework LogLevel to PSR-3 value.
     *
     * This mapping is used internally to improve performance by associating each LogLevel
     * with its corresponding PSR-3 value. It allows for efficient conversion between the
     * framework-specific log levels and the PSR-3 log levels.
     */
    private const PSR_MAP = [
        self::EMERGENCY => LogLevelPsr::EMERGENCY,
        self::ALERT => LogLevelPsr::ALERT,
        self::CRITICAL => LogLevelPsr::CRITICAL,
        self::ERROR => LogLevelPsr::ERROR,
        self::WARNING => LogLevelPsr::WARNING,
        self::NOTICE => LogLevelPsr::NOTICE,
        self::INFO => LogLevelPsr::INFO,
        self::DEBUG => LogLevelPsr::DEBUG,
    ];

    /**
     * Mapping of Framework LogLevel to RFC5424 value.
     *
     * This mapping is used internally to improve performance by associating each LogLevel
     * with its corresponding RFC5424 value. It allows for efficient conversion between the
     * framework-specific log levels and the RFC5424 log levels.
     */
    private const RFC_MAP = [
        self::EMERGENCY => 0,
        self::ALERT => 1,
        self::CRITICAL => 2,
        self::ERROR => 3,
        self::WARNING => 4,
        self::NOTICE => 5,
        self::INFO => 6,
        self::DEBUG => 7,
    ];

    public static function fromName(string $name): self
    {
        $name = \strtolower($name);

        foreach (self::PSR_MAP as $level => $psr) {
            if ($name === $psr) {
                return self::from($level);
            }
        }

        throw new InvalidArgumentException("'{$name}' is unsupported enum name");
    }

    public static function fromValue(int $value): self
    {
        // emum value
        if (($tmp = self::tryFrom($value)) !== null) {
            return $tmp;
        }

        // rfc value
        foreach (self::RFC_MAP as $level => $rfc) {
            if ($value === $rfc) {
                return self::from($level);
            }
        }

        throw new InvalidArgumentException("'{$value}' is unsupported enum name");
    }

    public static function fromMixed(mixed $level): self
    {
        if ($level instanceof self) {
            return $level;
        }

        if (\is_string($level)) {
            return self::fromName($level);
        }

        if (\is_int($level)) {
            return self::fromValue($level);
        }

        throw new InvalidArgumentException("'{$level}' is expected to be a string, int or " . self::class . ' instance)');
    }

    public function toName(): string
    {
        return (string) $this;
    }

    public function toValue(): int
    {
        return $this->value;
    }

    public function toPsrValue(): string
    {
        // REFACTOR add new type of custom exception?
        return self::PSR_MAP[$this->toValue()]
            ?? throw new InvalidArgumentException("Enum case '{$this->toName()}' does not implement a PSR equivalent.");
    }

    public function toRFC5424Value(): int
    {
        // REFACTOR add new type of custom exception?
        return self::RFC_MAP[$this->toValue()]
            ?? throw new InvalidArgumentException("Enum case '{$this->toName()}' does not implement an RFC equivalent.");
    }

    public function includes(LogLevelContract $level): bool
    {
        return $this->value >= $level->value;
    }

    public function higherThan(LogLevelContract $level): bool
    {
        return $this->value > $level->value;
    }

    public function lowerThan(LogLevelContract $level): bool
    {
        return $this->value < $level->value;
    }
}
