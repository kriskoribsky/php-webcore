<?php declare(strict_types=1);

namespace Core\Contracts\Log;

use Psr\Log\LogLevel as PsrLogLevel;

/**
 * Framework specific version of PSR-3: Logger Interface's LogLevel 
 */
enum LogLevel: int
{
    /**
     * Urgent alert.
     */
    case EMERGENCY = 600;

    /**
     * Action must be taken immediately
     *
     * Example: Entire website down, database unavailable, etc.
     * This should trigger the SMS alerts and wake you up.
     */
    case ALERT = 550;

    /**
     * Critical conditions
     *
     * Example: Application component unavailable, unexpected exception.
     */
    case CRITICAL = 500;

    /**
     * Runtime errors
     */
    case ERROR = 400;

    /**
     * Exceptional occurrences that are not errors
     *
     * Examples: Use of deprecated APIs, poor use of an API,
     * undesirable things that are not necessarily wrong.
     */
    case WARNING = 300;

    /**
     * Uncommon events
     */
    case NOTICE = 250;

    /**
     * Interesting events
     *
     * Examples: User logs in, SQL logs.
     */
    case INFO = 200;

    /**
     * Detailed debug information
     */
    case DEBUG = 100;

    public static function fromName(string $name): self
    {
        return match ($name) {
            'debug', 'Debug', 'DEBUG' => self::Debug,
            'info', 'Info', 'INFO' => self::Info,
            'notice', 'Notice', 'NOTICE' => self::Notice,
            'warning', 'Warning', 'WARNING' => self::Warning,
            'error', 'Error', 'ERROR' => self::Error,
            'critical', 'Critical', 'CRITICAL' => self::Critical,
            'alert', 'Alert', 'ALERT' => self::Alert,
            'emergency', 'Emergency', 'EMERGENCY' => self::Emergency,
        };
    }

    public static function fromValue(int $value): self
    {
        return self::from($value);
    }

    public function includes(LogLevel $level): bool
    {
        return $this->value <= $level->value;
    }

    public function isHigherThan(LogLevel $level): bool
    {
        return $this->value > $level->value;
    }

    public function isLowerThan(LogLevel $level): bool
    {
        return $this->value < $level->value;
    }

    public function toName(): string
    {
        return match ($this) {
            self::EMERGENCY => 'EMERGENCY',
            self::ALERT => 'ALERT',
            self::CRITICAL => 'CRITICAL',
            self::ERROR => 'ERROR',
            self::WARNING => 'WARNING',
            self::NOTICE => 'NOTICE',
            self::INFO => 'INFO',
            self::DEBUG => 'DEBUG',
        };
    }

    public function toPsrLogLevel(): string
    {
        return match ($this) {
            self::EMERGENCY => PsrLogLevel::EMERGENCY,
            self::ALERT => PsrLogLevel::ALERT,
            self::CRITICAL => PsrLogLevel::CRITICAL,
            self::ERROR => PsrLogLevel::ERROR,
            self::WARNING => PsrLogLevel::WARNING,
            self::NOTICE => PsrLogLevel::NOTICE,
            self::INFO => PsrLogLevel::INFO,
            self::DEBUG => PsrLogLevel::DEBUG,
        };
    }

    public function toRFC5424Level(): int
    {
        return match ($this) {
            self::EMERGENCY => 0,
            self::ALERT => 1,
            self::CRITICAL => 2,
            self::ERROR => 3,
            self::WARNING => 4,
            self::NOTICE => 5,
            self::INFO => 6,
            self::DEBUG => 7,
        };
    }
}