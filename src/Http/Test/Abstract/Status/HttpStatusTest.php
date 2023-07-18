<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
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
    public function testFromReasonPhraseReturnsInstanceOnCaseInsensitiveReasonPhrase(): void
    {
        $old = HttpStatus::ACCEPTED;
        $phrase = \strtoupper($old->getReasonPhrase());

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
    public function testTryFromReasonPhraseReturnsInstanceOnWhitespacedReasonPhrase(): void
    {
        $old = HttpStatus::NOT_FOUND;
        $phrase = "\n\n\n\r\v           " . $old->getReasonPhrase() . "             \r \t\t";

        $new = HttpStatus::tryFromReasonPhrase($phrase);

        $this->assertSame($old, $new);
    }

    /**
     * @depends testGetReasonPhraseIsAvailableForAllHttpStatuses
     */
    public function testTryFromReasonPhraseReturnsInstanceOnCaseInsensitiveReasonPhrase(): void
    {
        $old = HttpStatus::NOT_FOUND;
        $phrase = \strtoupper($old->getReasonPhrase());

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

    public function testIsInformationalReturnsTrueOn100StatusCode(): void
    {
        $this->assertTrue(HttpStatus::from(100)->isInformational());
    }

    public function testIsInformationalReturnsFalseOn200StatusCode(): void
    {
        $this->assertFalse(HttpStatus::from(200)->isInformational());
    }

    public function testIsSuccessfulReturnsTrueOn200StatusCode(): void
    {
        $this->assertTrue(HttpStatus::from(200)->isSuccessful());
    }

    public function testIsSuccessfulReturnsFalseOn300StatusCode(): void
    {
        $this->assertFalse(HttpStatus::from(300)->isSuccessful());
    }

    public function testIsRedirectionReturnsTrueOn300StatusCode(): void
    {
        $this->assertTrue(HttpStatus::from(300)->isRedirection());
    }

    public function testIsRedirectionReturnsFalseOn400StatusCode(): void
    {
        $this->assertFalse(HttpStatus::from(400)->isRedirection());
    }

    public function testIsClientErrorReturnsTrueOn400StatusCode(): void
    {
        $this->assertTrue(HttpStatus::from(400)->isClientError());
    }

    public function testIsClientErrorReturnsFalseOn500StatusCode(): void
    {
        $this->assertFalse(HttpStatus::from(500)->isClientError());
    }

    public function testIsServerErrorReturnsTrueOn500StatusCode(): void
    {
        $this->assertTrue(HttpStatus::from(500)->isServerError());
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
