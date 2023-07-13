<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Concrete;

use Web\Utils\Http\Abstract\Status\HttpStatusClassInterface;
use Web\Utils\Http\Abstract\Status\HttpStatusClassTrait;
use Web\Utils\Http\Abstract\Status\HttpStatusInterface;

class HttpStatus implements HttpStatusClassInterface, HttpStatusInterface
{
    use HttpStatusClassTrait;

    /**
     * @param int $value HTTP status value
     */
    public function __construct(
        public readonly int $value
    ) {}
}
