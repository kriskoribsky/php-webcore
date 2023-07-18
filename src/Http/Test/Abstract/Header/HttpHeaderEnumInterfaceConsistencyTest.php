<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Test\Abstract\Header;

use PHPUnit\Framework\TestCase;
use Web\Utils\Http\Abstract\Header\HttpHeader;
use Web\Utils\Http\Abstract\Header\HttpHeaderInterface;

/**
 * @internal
 *
 * @covers \Web\Utils\Http\Abstract\Header\HttpHeader
 *
 * @small
 */
final class HttpHeaderEnumInterfaceConsistencyTest extends TestCase
{
    // Tests
    public function testEnumCasesIdenticalToInterfaceConstants(): void
    {
        $interfaceConstants = (new \ReflectionClass(HttpHeaderInterface::class))->getConstants();

        $enumNames = \array_column(HttpHeader::cases(), 'name');
        $enumValues = \array_column(HttpHeader::cases(), 'value');
        $enumCases = \array_combine($enumNames, $enumValues);

        $this->assertEqualsCanonicalizing($interfaceConstants, $enumCases);
    }
}
