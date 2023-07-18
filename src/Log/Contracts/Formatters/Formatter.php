<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebCore\Log\Contracts\Formatters;

use WebCore\Log\Contracts\LogRecord;

/**
 * Interface that all Formatters must implement.
 */
interface Formatter
{
    /**
     * Formats a log record.
     *
     * Formatting a record means normalizing and formatting incoming records
     * so that they can be used by the handlers to ouput useful information.
     *
     * @param LogRecord $record the record to format
     *
     * @return LogRecord the formatted record
     */
    public function format(LogRecord $record): LogRecord;

    /**
     * Formats a set of records at once.
     *
     * @param LogRecord $records records to format
     *
     * @return array<LogRecord> formatted records
     */
    public function formatBatch(LogRecord ...$records): array;
}
