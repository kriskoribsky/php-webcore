<?php declare(strict_types=1);

/*
 * This file is part of the Webutils package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Test\Abstract\Status;

use PHPUnit\Framework\TestCase;
use Web\Utils\Http\Abstract\Status\HttpStatus;
use Web\Utils\Http\Exception\UnrecognizedReasonPhraseException;

/**
 * @internal
 *
 * @covers \Web\Utils\Http\Abstract\Status\HttpStatus
 *
 * @small
 */
final class HttpStatusTest extends TestCase
{
    // Tests

    /**
     * @testdox Status $case has reason phrase
     *
     * @dataProvider provideAllHttpStatusCases
     */
    public function testGetReasonPhraseIsAvailableForAllHttpStatuses(HttpStatus $case): void
    {
        $this->assertNotNull($case->getReasonPhrase());
    }

    /**
     * @depends testGetReasonPhraseIsAvailableForAllHttpStatuses
     */
    public function testFromReasonPhraseReturnsInstanceOnValidReasonPhrase(): void
    {
        $old = HttpStatus::ACCEPTED;
        $phrase = $old->getReasonPhrase();

        $new = HttpStatus::fromReasonPhrase($phrase);

        $this->assertSame($old, $new);
    }

    /**
     * @depends testGetReasonPhraseIsAvailableForAllHttpStatuses
     */
    public function testFromReasonPhraseReturnsInstanceOnWhitespacedReasonPhrase(): void
    {
        $old = HttpStatus::ACCEPTED;
        $phrase = "\n\n\n\r\v           " . $old->getReasonPhrase() . "             \r \t\t";

        $new = HttpStatus::fromReasonPhrase($phrase);

        $this->assertSame($old, $new);
    }

    /**
     * @depends testGetReasonPhraseIsAvailableForAllHttpStatuses
     */
    public function testFromReasonPhraseThrowsExceptionOnInvalidReasonPhrase(): void
    {
        $old = HttpStatus::ACCEPTED;
        $phrase = $old->getReasonPhrase() . 'some kind of wrong postfix added by mistake';

        $this->expectException(UnrecognizedReasonPhraseException::class);
        HttpStatus::fromReasonPhrase($phrase);
    }

    /**
     * @depends testGetReasonPhraseIsAvailableForAllHttpStatuses
     */
    public function testTryFromReasonPhraseReturnsInstanceOnValidReasonPhrase(): void
    {
        $old = HttpStatus::NOT_FOUND;
        $phrase = '        ' . $old->getReasonPhrase() . "      \r     \t\t\n";

        $new = HttpStatus::tryFromReasonPhrase($phrase);

        $this->assertSame($old, $new);
    }

    /**
     * @depends testGetReasonPhraseIsAvailableForAllHttpStatuses
     */
    public function testTryFromReasonPhraseReturnsNullOnInvalidReasonPhrase(): void
    {
        $old = HttpStatus::NOT_FOUND;
        $phrase = 'wrong prefix typo' . $old->getReasonPhrase();

        $this->assertNull(HttpStatus::tryFromReasonPhrase($phrase));
    }

    // Data providers

    /**
     * @return iterable<iterable<HttpStatus>>
     */
    public static function provideAllHttpStatusCases(): iterable
    {
        return \array_map(static fn (HttpStatus $status): array => [$status], HttpStatus::cases());
    }
}
