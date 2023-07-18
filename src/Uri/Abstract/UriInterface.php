<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Uri\Abstract;

use Psr\Http\Message\UriInterface as PsrUriInterface;

/**
 * Value object extending Psr-7's UriInterface.
 *
 * This interface is meant to represent URIs according to RFC 3986 and to
 * provide methods for most common operations. Additional functionality for
 * working with URIs can be provided on top of the interface or externally.
 * Its primary use is for HTTP requests, but may also be used in other
 * contexts.
 *
 * Instances of this interface are considered immutable; all methods that
 * might change state MUST be implemented such that they retain the internal
 * state of the current instance and return an instance that contains the
 * changed state.
 *
 * @see \Psr\Http\Message\UriInterface Psr-7's UriInterface.
 * @see http://tools.ietf.org/html/rfc3986 (the URI specification)
 */
interface UriInterface extends PsrUriInterface {}
