<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Test\Concrete;

use PHPUnit\Framework\TestCase;
use Web\Utils\Http\Abstract\Method\HttpMethodInterface;
use Web\Utils\Http\Concrete\HttpMethod;

/**
 * @internal
 *
 * @covers \Web\Utils\Http\Concrete\HttpMethod
 *
 * @small
 */
final class HttpMethodTest extends TestCase
{
    public function testClassImplementsHttpMethodInterface(): void
    {
        $new = new HttpMethod(HttpMethodInterface::GET);

        $this->assertInstanceOf(HttpMethodInterface::class, $new);
    }
}
