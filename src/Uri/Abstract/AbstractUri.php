<?php declare(strict_types=1);

/*
 * This file is part of the Webutils package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Uri\Abstract;

use Psr\Http\Message\UriInterface;

abstract class AbstractUri implements \Stringable, UriInterface
{
    public function __toString(): string {}

    /**
     * {@inheritDoc}
     */
    final public function getScheme(): string {}

    /**
     * {@inheritDoc}
     */
    final public function getAuthority(): string {}

    /**
     * {@inheritDoc}
     */
    final public function getUserInfo(): string {}

    /**
     * {@inheritDoc}
     */
    final public function getHost(): string {}

    /**
     * {@inheritDoc}
     */
    final public function getPort(): ?int {}

    /**
     * {@inheritDoc}
     */
    final public function getPath(): string {}

    /**
     * {@inheritDoc}
     */
    final public function getQuery(): string {}

    /**
     * {@inheritDoc}
     */
    final public function getFragment(): string {}

    /**
     * {@inheritDoc}
     */
    final public function withScheme(string $scheme): UriInterface {}

    /**
     * {@inheritDoc}
     */
    final public function withUserInfo(string $user, ?string $password = null): UriInterface {}

    /**
     * {@inheritDoc}
     */
    final public function withHost(string $host): UriInterface {}

    /**
     * {@inheritDoc}
     */
    final public function withPort(?int $port): UriInterface {}

    /**
     * {@inheritDoc}
     */
    final public function withPath(string $path): UriInterface {}

    /**
     * {@inheritDoc}
     */
    final public function withQuery(string $query): UriInterface {}

    /**
     * {@inheritDoc}
     */
    final public function withFragment(string $fragment): UriInterface {}
}
