<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Abstract\Method;

/**
 * HTTP defines a set of request methods to indicate the desired
 * action to be performed for a given resource.
 *
 * Each of them implements a different semantic, but some common
 * features are shared by a group of them: e.g.a request method
 * can be SAFE, IDEMPOTENT, or CACHEABLE.
 *
 * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-methods
 */
interface HttpMethodInterface
{
    /**
     * The GET method retrieves a representation of the specified resource.
     *
     * Group: SAFE, CACHEABLE
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-get
     */
    public const GET = 'GET';

    /**
     * The HEAD method is identical to GET, but it doesn't return a response body.
     * It is useful for retrieving response headers and checking the existence of a resource.
     *
     * Group: SAFE, CACHEABLE
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-head
     */
    public const HEAD = 'HEAD';

    /**
     * The POST method is used to submit an entity to the specified resource,
     * often resulting in the creation of a new resource.
     *
     * Group: CACHEABLE
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-post
     */
    public const POST = 'POST';

    /**
     * The PUT method replaces all current representations of the target
     * resource with the request payload.
     *
     * Group: IDEMPOTENT
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-put
     */
    public const PUT = 'PUT';

    /**
     * The DELETE method deletes the specified resource.
     *
     * Group: IDEMPOTENT
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-delete
     */
    public const DELETE = 'DELETE';

    /**
     * The CONNECT method establishes a tunnel to the server identified by the target resource.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-connect
     */
    public const CONNECT = 'CONNECT';

    /**
     * The OPTIONS method is used to describe the communication options for the target resource.
     *
     * Group: SAFE
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-options
     */
    public const OPTIONS = 'OPTIONS';

    /**
     * The TRACE method performs a message loop-back test along the path to the target resource,
     * providing a means to check for request message transformations.
     *
     * Group: SAFE
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-trace
     */
    public const TRACE = 'TRACE';

    /**
     * The PATCH method is used to apply partial modifications to a resource.
     *
     * This method is not part of RFC 9110 HTTP Semantics
     */
    public const PATCH = 'PATCH';
}
