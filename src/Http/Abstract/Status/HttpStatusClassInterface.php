<?php declare(strict_types=1);

/*
 * This file is part of the Webutils package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Abstract\Status;

/**
 * Defines an interface for retrieving the class of the current HTTP status
 * based on the RFC 9110 status code categorization.
 *
 * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-status-codes
 */
interface HttpStatusClassInterface
{
    /**
     * Checks if the HTTP status belongs to the 1xx informational class.
     *
     * @return bool true if the status belongs to the 1xx class, false otherwise
     */
    public function isInformational(): bool;

    /**
     * Checks if the HTTP status belongs to the 2xx successful class.
     *
     * @return bool true if the status belongs to the 2xx class, false otherwise
     */
    public function isSuccessful(): bool;

    /**
     * Checks if the HTTP status belongs to the 3xx redirection class.
     *
     * @return bool true if the status belongs to the 3xx class, false otherwise
     */
    public function isRedirection(): bool;

    /**
     * Checks if the HTTP status belongs to the 4xx client error class.
     *
     * @return bool true if the status belongs to the 4xx class, false otherwise
     */
    public function isClientError(): bool;

    /**
     * Checks if the HTTP status belongs to the 5xx server error class.
     *
     * @return bool true if the status belongs to the 5xx class, false otherwise
     */
    public function isServerError(): bool;
}
