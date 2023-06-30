<?php declare(strict_types=1);

/*
 * This file is part of the Webutils package.
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
     * Get the file extension associated with the current
     * media type.
     *
     * @return ?string the file extension or null if extension is not provided for this media type
     *
     * @throws \Web\Utils\Http\Exception\UnsupportedExtensionException not supported
     */
    public function getFileExtension(): ?string;

    /**
     * Create a new instance of based on a file extension.
     *
     * @param string $extension the file extension
     *
     * @return static new instance
     *
     * @throws \Web\Utils\Http\Exception\UnsupportedExtensionException not supported
     */
    public static function fromFileExtension(string $extension): static;

    /**
     * Try to create a new instance based on a file extension.
     * Returns null if the creation fails.
     *
     * @param string $extension the file extension
     *
     * @return ?static new instance, or null on unsupported/ambiguous extension
     */
    public static function tryFromFileExtension(string $extension): ?static;
}
