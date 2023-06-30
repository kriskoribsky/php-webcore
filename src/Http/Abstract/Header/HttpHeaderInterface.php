<?php declare(strict_types=1);

/*
 * This file is part of the Webutils package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Abstract\Header;

/**
 * HTTP headers let the client and the server pass additional information
 * with an HTTP request or response. An HTTP header consists of its
 * case-insensitive name followed by a colon (:), then by its value.
 *
 * This interfaces provides names for standard headers defined in IANA
 * list, as well as some non-standrd ones.
 *
 * @see https://en.wikipedia.org/wiki/List_of_HTTP_header_fields
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers
 * @see https://www.iana.org/assignments/message-headers/message-headers.xml#perm-headers
 */
interface HttpHeaderInterface
{
}
