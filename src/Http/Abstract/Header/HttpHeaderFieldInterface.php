<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Abstract\Header;

/**
 * Interface for manipulating HTTP header fields.
 *
 * This interface provides methods for generating valid
 * header fields and extracting header constants from
 * existing header fields.
 *
 * @see HttpHeaderInterface
 */
interface HttpHeaderFieldInterface
{
    /**
     * Generates a valid header field by combining the current
     * header constant with the provided value.
     *
     * @param string $value the header value to pair with the key
     *
     * @return string a valid HTTP header field with the value
     */
    public function getHeaderField(string $value): string;

    /**
     * Extracts the header constant from a valid key-value header field.
     *
     * @param string $field a valid HTTP header field with a value
     *
     * @return static the header constant
     *
     * @throws \Web\Utils\Http\Exception\UnsupportedHeaderException
     */
    public static function fromHeaderField(string $field): static;

    /**
     * Tries to extract the header constant from a valid key-value header field.
     * Returns null if the extraction fails.
     *
     * @param string $field a valid HTTP header field with a value
     *
     * @return ?static the header constant if successfully extracted, or null otherwise
     */
    public static function tryFromHeaderField(string $field): ?static;
}
