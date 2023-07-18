<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Test\Concrete;

use PHPUnit\Framework\TestCase;
use Web\Utils\Http\Abstract\Status\HttpStatusInterface;
use Web\Utils\Http\Concrete\HttpStatus;

/**
 * @internal
 *
 * @covers \Web\Utils\Http\Concrete\HttpStatus
 *
 * @small
 */
final class HttpStatusTest extends TestCase
{
    public function testClassImplementsHttpStatusInterface(): void
    {
        $new = new HttpStatus(HttpStatusInterface::OK);

        $this->assertInstanceOf(HttpStatusInterface::class, $new);
    }
}
