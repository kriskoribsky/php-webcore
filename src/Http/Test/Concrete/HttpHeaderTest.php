<?php declare(strict_types=1);

/*
 * This file is part of the Webutils package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Test\Concrete;

use PHPUnit\Framework\TestCase;
use Web\Utils\Http\Abstract\Header\HttpHeaderInterface;
use Web\Utils\Http\Concrete\HttpHeader;

/**
 * @internal
 *
 * @covers \Web\Utils\Http\Concrete\HttpHeader
 *
 * @small
 */
final class HttpHeaderTest extends TestCase
{
    public function testClassImplementsHttpHeaderInterface(): void
    {
        $new = new HttpHeader(HttpHeaderInterface::CONTENT_LENGTH);

        $this->assertInstanceOf(HttpHeaderInterface::class, $new);
    }
}
