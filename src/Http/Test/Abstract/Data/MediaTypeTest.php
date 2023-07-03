<?php declare(strict_types=1);

/*
 * This file is part of the Webutils package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Test\Abstract\Data;

use PHPUnit\Framework\TestCase;
use Web\Utils\Http\Abstract\Data\MediaType;
use Web\Utils\Http\Exception\UnsupportedExtensionException;

/**
 * @internal
 *
 * @covers \Web\Utils\Http\Abstract\Data\MediaType
 *
 * @small
 */
final class MediaTypeTest extends TestCase
{
    // Tests
    /**
     * @testdox Media type $case has valid extension
     *
     * @dataProvider provideGetFileExtensionNeverReturnsNullCases
     */
    public function testGetFileExtensionNeverReturnsNull(MediaType $case): void
    {
        $this->assertNotNull($case->getFileExtension());
    }

    /**
     * @testdox Media type $case extension does not start with '.'
     *
     * @depends testGetFileExtensionNeverReturnsNull
     *
     * @dataProvider provideGetFileExtensionDoesNotContainDotCases
     */
    public function testGetFileExtensionDoesNotContainDot(MediaType $case): void
    {
        $this->assertStringStartsNotWith('.', $case->getFileExtension());
    }

    /**
     * @depends testGetFileExtensionNeverReturnsNull
     */
    public function testfromFilePathWorksWithValidPath(): void
    {
        $this->assertSame(MediaType::APPLICATION_PHP_X, MediaType::fromFilePath(__FILE__));
    }

    /**
     * @depends testGetFileExtensionNeverReturnsNull
     */
    public function testfromFilePathWorksWithJustExtension(): void
    {
        $old = MediaType::TEXT_JAVASCRIPT;
        $path = $old->getFileExtension();

        $new = MediaType::fromFilePath($path);

        $this->assertSame($old, $new);
    }

    /**
     * @depends testGetFileExtensionNeverReturnsNull
     * @depends testGetFileExtensionDoesNotContainDot
     */
    public function testfromFilePathWorksWithoutLeadingDotAndWithWhitespace(): void
    {
        $old = MediaType::TEXT_JAVASCRIPT;
        $path = "\t      \t \n  " . $old->getFileExtension() . "\t  \v  \r";

        $new = MediaType::fromFilePath($path);

        $this->assertSame($old, $new);
    }

    /**
     * @depends testGetFileExtensionNeverReturnsNull
     */
    public function testfromFilePathWorksWithInvalidDirectoryFormat(): void
    {
        $old = MediaType::TEXT_JAVASCRIPT;
        $path = "\r\trandom/file\\path" . \DIRECTORY_SEPARATOR . "\nrandom_file\tfile." . $old->getFileExtension();

        $new = MediaType::fromFilePath($path);

        $this->assertSame($old, $new);
    }

    /**
     * @depends testGetFileExtensionNeverReturnsNull
     */
    public function testfromFilePathThrowsExceptionOnPathWithoutExtension(): void
    {
        $path = __DIR__ . 'test_file_without_extension';

        $this->expectException(UnsupportedExtensionException::class);
        MediaType::fromFilePath($path);
    }

    /**
     * @depends testGetFileExtensionNeverReturnsNull
     */
    public function testfromFilePathThrowsExceptionOnInvalidExtensionFormat(): void
    {
        $path = __DIR__ . MediaType::TEXT_JAVASCRIPT->getFileExtension() . '.dist';

        $this->expectException(UnsupportedExtensionException::class);
        MediaType::fromFilePath($path);
    }

    public function testTryFromFilePathReturnsInstanceOnValidPath(): void
    {
        $this->assertSame(MediaType::APPLICATION_PHP_X, MediaType::tryFromFilePath(__FILE__));
    }

    public function testTryFromFilePathReturnsNullOnInvalidPath(): void
    {
        $this->assertNull(MediaType::tryFromFilePath('random_dir/random_file_without_ext'));
    }

    // Data providers
    /**
     * @return iterable<iterable<MediaType>>
     */
    public static function provideGetFileExtensionNeverReturnsNullCases(): iterable
    {
        return self::provideAllEnumCases();
    }

    /**
     * @return iterable<iterable<MediaType>>
     */
    public static function provideGetFileExtensionDoesNotContainDotCases(): iterable
    {
        return self::provideAllEnumCases();
    }

    /**
     * @internal
     *
     * @return iterable<iterable<MediaType>>
     */
    private static function provideAllEnumCases(): iterable
    {
        $cases = MediaType::cases();
        $result = [];

        foreach ($cases as $case) {
            $result[] = [$case];
        }

        return $result;
    }
}
