<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Exception;

/**
 * Thrown when given reason phrase is not associated with any of the HTTP statuses.
 */
final class UnrecognizedReasonPhraseException extends \InvalidArgumentException {}
