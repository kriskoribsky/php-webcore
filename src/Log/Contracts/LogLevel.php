<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebCore\Log\Contracts;

/**
 * Interface for enum implementing framework specific version
 * of PSR-3: Logger Interface's LogLevel.
 */
interface LogLevel
{
    /**
     * Create using name.
     *
     * @param string $name the name of the log level
     *
     * @return self the corresponding log level enum instance
     *
     * @throws \WebCore\Log\Exceptions\InvalidArgumentException if name not one of the eight RFC 5424 levels
     */
    public static function fromName(string $name): self;

    /**
     * Create using number.
     *
     * @param int $value the value of the log level
     *
     * @return self the corresponding log level enum instance
     *
     * @throws \WebCore\Log\Exceptions\InvalidArgumentException if value not one of the eight enum levels
     */
    public static function fromValue(int $value): self;

    /**
     * Create a using a mixed value.
     *
     * @param mixed $level the mixed value representing the log level
     *
     * @return self the corresponding log level enum instance
     *
     * @throws \WebCore\Log\Exceptions\InvalidArgumentException if the mixed value is invalid or not supported
     */
    public static function fromMixed(mixed $level): self;

    /**
     * Converts the log level to its corresponding name.
     *
     * @return string the name of the log level
     */
    public function toName(): string;

    /**
     * Converts the log level to its corresponding value.
     *
     * @return int the value of the log level
     */
    public function toValue(): int;

    /**
     * Converts the log level to its corresponding PSR-3 value.
     *
     * @return string the PSR-3 value of the log level
     */
    public function toPsrValue(): string;

    /**
     * Converts the log level to its corresponding RFC 5424 value.
     *
     * @return int the RFC 5424 value of the log level
     */
    public function toRFC5424Value(): int;

    /**
     * Checks if this log level is higher or equal to the given log level.
     *
     * @param self $level The log level to compare
     *
     * @return bool true if this log level includes the given log level, false otherwise
     */
    public function includes(self $level): bool;

    /**
     * Checks if this log level is higher than the given log level.
     *
     * @param self $level The log level to compare
     *
     * @return bool true if this log level is higher than the given log level, false otherwise
     */
    public function higherThan(self $level): bool;

    /**
     * Checks if this log level is lower than the given log level.
     *
     * @param self $level The log level to compare
     *
     * @return bool true if this log level is lower than the given log level, false otherwise
     */
    public function lowerThan(self $level): bool;
}
