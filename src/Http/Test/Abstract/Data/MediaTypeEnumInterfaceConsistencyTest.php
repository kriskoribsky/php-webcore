<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Test\Abstract\Data;

use PHPUnit\Framework\TestCase;
use Web\Utils\Http\Abstract\Data\MediaType;
use Web\Utils\Http\Abstract\Data\MediaTypeInterface;

/**
 * @internal
 *
 * @covers \Web\Utils\Http\Abstract\Data\MediaType
 *
 * @small
 */
final class MediaTypeEnumInterfaceConsistencyTest extends TestCase
{
    // Tests
    public function testEnumCasesIdenticalToInterfaceConstants(): void
    {
        $interfaceConstants = (new \ReflectionClass(MediaTypeInterface::class))->getConstants();

        $enumNames = \array_column(MediaType::cases(), 'name');
        $enumValues = \array_column(MediaType::cases(), 'value');
        $enumCases = \array_combine($enumNames, $enumValues);

        $this->assertEqualsCanonicalizing($interfaceConstants, $enumCases);
    }
}
