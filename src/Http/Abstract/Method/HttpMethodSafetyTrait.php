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
 * @see HttpMethodSafetyInterface
 */
trait HttpMethodSafetyTrait
{
    /**
     * Grouping of HTTP methods according to RFC 9110 HTTP Semantics.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-common-method-properties
     */
    private const HTTP_METHOD_SAFETY_GROUPS = [
        'SAFE' => ['GET', 'HEAD', 'OPTIONS', 'TRACE'],
        'IDEMPOTENT' => ['PUT', 'DELETE'],
        'CACHEABLE' => ['GET', 'HEAD', 'POST'],
    ];

    /**
     * {@inheritDoc}
     */
    public function isSafe(): bool
    {
        return \in_array($this->value, self::HTTP_METHOD_SAFETY_GROUPS['SAFE'], true);
    }

    /**
     * {@inheritDoc}
     */
    public function isIdempotent(): bool
    {
        return \in_array($this->value, self::HTTP_METHOD_SAFETY_GROUPS['IDEMPOTENT'], true);
    }

    /**
     * {@inheritDoc}
     */
    public function isCacheable(): bool
    {
        return \in_array($this->value, self::HTTP_METHOD_SAFETY_GROUPS['CACHEABLE'], true);
    }
}
