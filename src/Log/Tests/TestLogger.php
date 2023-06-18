<?php declare(strict_types=1);

namespace WebCore\Log\Tests;

use WebCore\Log\Implementations\Logger;
use WebCore\Log\Contracts\Handlers\Handler;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\Attributes\UsesClass;

#[CoversClass(Logger::class)]
#[UsesClass(Handler::class)]
class TestLogger extends TestCase
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
        $this->assertNotEquals($first, $second);
        $this->assertSame($handler, $second->popHandler());
    }
}
