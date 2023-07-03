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
use Web\Utils\Http\Abstract\Data\MediaTypeInterface;
use Web\Utils\Http\Concrete\MediaType;

/**
 * @internal
 *
 * @covers \Web\Utils\Http\Concrete\MediaType
 *
 * @small
 */
final class MediaTypeTest extends TestCase
{
    // Tests
    public function testClassImplementsMediaTypeInterface(): void
    {
        $new = new MediaType(MediaTypeInterface::TEXT_JAVASCRIPT);

        $this->assertInstanceOf(MediaTypeInterface::class, $new);
    }
}
