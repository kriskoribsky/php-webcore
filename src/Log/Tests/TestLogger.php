<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebCore\Log\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use WebCore\Log\Contracts\Handlers\Handler;
use WebCore\Log\Implementations\Logger;

/**
 * @internal
 *
 * @coversNothing
 *
 * @small
 */
#[CoversClass(Logger::class)]
#[UsesClass(Handler::class)]
final class TestLogger extends TestCase
{
    public function testGetChannel(): void
    {
        $channel = 'channel';
        $logger = new Logger($channel);

        $this->assertSame($channel, $logger->getChannel());
    }

    public function testWithChannel(): void
    {
        $firstChannel = 'channel 1';
        $secondChannel = 'channel 2';

        $handler = $this->createStub(Handler::class);

        $first = (new Logger($firstChannel))->pushHandler($handler);
        $second = $first->withChannel($secondChannel);

        $this->assertSame($firstChannel, $first->getChannel());
        $this->assertSame($secondChannel, $second->getChannel());
        $this->assertNotSame($first, $second);
        $this->assertSame($handler, $second->popHandler());
    }
}
