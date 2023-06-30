<?php declare(strict_types=1);

/*
 * This file is part of the Webutils package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Abstract\Method;

/**
 * Provides the ability for HttpMethod to semantically categorize
 * HTTP methods according to RFC 9110 HTTP Semantics.
 *
 * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-common-method-properties
 */
interface HttpMethodSafetyInterface
{
    /**
     * Check if the HTTP method belongs to a safe group.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-safe-methods
     *
     * @return bool true if the method belongs to a safe group, false otherwise
     */
    public function isSafe(): bool;

    /**
     * Check if the HTTP method belongs to an idempotent group.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-idempotent-methods
     *
     * @return bool true if the method belongs to an idempotent group, false otherwise
     */
    public function isIdempotent(): bool;

    /**
     * Check if the HTTP method belongs to a cacheable group.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-methods-and-caching
     *
     * @return bool true if the method belongs to a cacheable group, false otherwise
     */
    public function isCacheable(): bool;
}
