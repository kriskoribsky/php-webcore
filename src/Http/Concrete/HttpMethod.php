<?php declare(strict_types=1);

/*
 * This file is part of the Webutils package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Concrete;

use Web\Utils\Http\Abstract\Method\HttpMethodInterface;
use Web\Utils\Http\Abstract\Method\HttpMethodSafetyInterface;
use Web\Utils\Http\Abstract\Method\HttpMethodSafetyTrait;

class HttpMethod implements HttpMethodInterface, HttpMethodSafetyInterface
{
    use HttpMethodSafetyTrait;

    /**
     * @param string $value HTTP method value
     */
    public function __construct(
        public readonly string $value
    ) {}
}
