<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Test\Abstract\Status;

use PHPUnit\Framework\TestCase;
use Web\Utils\Http\Abstract\Status\HttpStatus;
use Web\Utils\Http\Abstract\Status\HttpStatusInterface;

/**
 * @internal
 *
 * @covers \Web\Utils\Http\Abstract\Status\HttpStatus
 *
 * @small
 */
final class HttpStatusEnumInterfaceConsistencyTest extends TestCase
{
    // Tests
    public function testEnumCasesIdenticalToInterfaceConstants(): void
    {
        $interfaceConstants = (new \ReflectionClass(HttpStatusInterface::class))->getConstants();

        $enumNames = \array_column(HttpStatus::cases(), 'name');
        $enumValues = \array_column(HttpStatus::cases(), 'value');
        $enumCases = \array_combine($enumNames, $enumValues);

        $this->assertEqualsCanonicalizing($interfaceConstants, $enumCases);
    }
}
