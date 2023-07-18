<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Test\Abstract\Method;

use PHPUnit\Framework\TestCase;
use Web\Utils\Http\Abstract\Method\HttpMethod;
use Web\Utils\Http\Abstract\Method\HttpMethodInterface;

/**
 * @internal
 *
 * @covers \Web\Utils\Http\Abstract\Method\HttpMethod
 *
 * @small
 */
final class HttpMethodEnumInterfaceConsistencyTest extends TestCase
{
    // Tests
    public function testEnumCasesIdenticalToInterfaceConstants(): void
    {
        $interfaceConstants = (new \ReflectionClass(HttpMethodInterface::class))->getConstants();

        $enumNames = \array_column(HttpMethod::cases(), 'name');
        $enumValues = \array_column(HttpMethod::cases(), 'value');
        $enumCases = \array_combine($enumNames, $enumValues);

        $this->assertEqualsCanonicalizing($interfaceConstants, $enumCases);
    }
}
