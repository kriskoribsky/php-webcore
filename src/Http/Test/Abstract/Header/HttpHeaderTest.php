<?php declare(strict_types=1);

/*
 * This file is part of the Webutils package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Test\Abstract\Header;

use PHPUnit\Framework\TestCase;
use Web\Utils\Http\Abstract\Data\MediaType;
use Web\Utils\Http\Abstract\Header\HttpHeader;
use Web\Utils\Http\Exception\UnsupportedHeaderException;

/**
 * @internal
 *
 * @covers \Web\Utils\Http\Abstract\Header\HttpHeader
 *
 * @uses \Web\Utils\Http\Abstract\Data\MediaType
 *
 * @small
 */
final class HttpHeaderTest extends TestCase
{
    public function testGetHeaderFieldContainsHeaderName(): void
    {
        $header = HttpHeader::CONTENT_TYPE;

        $field = $header->getHeaderField(MediaType::APPLICATION_JSON->value);

        $this->assertStringContainsString($header->value, $field);
    }

    public function testGetHeaderFieldContainsColon(): void
    {
        $header = HttpHeader::CONTENT_TYPE;

        $field = $header->getHeaderField(MediaType::APPLICATION_JSON->value);

        $this->assertStringContainsString(':', $field);
    }

    public function testFromHeaderFieldReturnsInstanceOnValidHeaderField(): void
    {
        $old = HttpHeader::CONTENT_TYPE;

        $field = $old->getHeaderField(MediaType::APPLICATION_JSON->value);

        $new = HttpHeader::fromHeaderField($field);

        $this->assertSame($old, $new);
    }

    public function testFromHeaderFieldReturnsInstanceOnMalformedHeaderFieldValue(): void
    {
        $old = HttpHeader::CONTENT_TYPE;

        $field = $old->getHeaderField(MediaType::APPLICATION_JSON->value);
        $field = $field . "\r: \t\n : " . MediaType::APPLICATION_PHP_X->value;

        $new = HttpHeader::fromHeaderField($field);

        $this->assertSame($old, $new);
    }

    public function testFromHeaderFieldReturnsInstanceOnWhitespacedHeaderField(): void
    {
        $old = HttpHeader::CONTENT_TYPE;

        $field = $old->getHeaderField(MediaType::APPLICATION_JSON->value);
        $field = \explode(':', $field);
        $field = \implode("\t \v \n:       :     ", $field);
        $field = "      \n \r \v      \v  " . $field . "\t \v \r \n";

        $new = HttpHeader::fromHeaderField($field);

        $this->assertSame($old, $new);
    }

    public function testFromHeaderFieldThrowsExceptionOnInvalidHeaderField(): void
    {
        $old = HttpHeader::CONTENT_TYPE;

        $field = $old->getHeaderField(MediaType::APPLICATION_JSON->value);
        $field = HttpHeader::ACCEPT_ENCODING->value . $field;

        $this->expectException(UnsupportedHeaderException::class);
        HttpHeader::fromHeaderField($field);
    }

    public function testTryFromHeaderFieldReturnsInstanceOnValidHeaderField(): void
    {
        $old = HttpHeader::CONTENT_TYPE;

        $field = $old->getHeaderField(MediaType::APPLICATION_JSON->value);

        $new = HttpHeader::tryFromHeaderField($field);

        $this->assertSame($old, $new);
    }

    public function testTryFromHeaderFieldReturnsNullOnInvalidHeaderField(): void
    {
        $old = HttpHeader::CONTENT_TYPE;

        $field = $old->getHeaderField(MediaType::APPLICATION_JSON->value);
        $field = HttpHeader::ACCEPT_ENCODING->value . $field;

        $new = HttpHeader::tryFromHeaderField($field);

        $this->assertNull($new);
    }
}
