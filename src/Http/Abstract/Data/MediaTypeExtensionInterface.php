<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Abstract\Data;

/**
 * Interface for manipulating file extensions using
 * media type constants.
 */
interface MediaTypeExtensionInterface
{
    /**
     * Gets the file extension associated with the current
     * media type.
     *
     * @return string file extension of the current media type
     */
    public function getFileExtension(): string;

    /**
     * Creates a new instance based on provided file path's extension.
     *
     * This method operates naively on the input string,
     * and is not aware of the actual filesystem.
     *
     * @param string $path file path containing extension
     *
     * @return static new instance
     *
     * @throws \Web\Utils\Http\Exception\UnsupportedExtensionException
     */
    public static function fromFilePath(string $path): static;

    /**
     * Tries to create a new instance based on provided file path's extension.
     * Returns null if the creation fails.
     *
     * This method operates naively on the input string,
     * and is not aware of the actual filesystem.
     *
     * @param string $path file path containing extension
     *
     * @return ?static new instance, or null on unsupported/ambiguous extension
     */
    public static function tryFromFilePath(string $path): ?static;
}
