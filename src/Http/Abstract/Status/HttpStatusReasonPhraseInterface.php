<?php declare(strict_types=1);

/*
 * This file is part of the Webutils package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Abstract\Status;

/**
 * Provides the ability to generate reason phrase
 * from current http status.
 */
interface HttpStatusReasonPhraseInterface
{
    /**
     * Gets the reason phrase associated with the current
     * http status.
     *
     * @return string reason phrase of the current HTTP status
     */
    public function getReasonPhrase(): string;

    /**
     * Creates a new instance based on provided reason phrase.
     *
     * @param string $phrase the reason phrase
     *
     * @return static new instance
     *
     * @throws \Web\Utils\Http\Exception\UnrecognizedReasonPhraseException
     */
    public function fromReasonPhrase(string $phrase): static;

    /**
     * Tries to create a new instance based on provided reason phrase.
     * Returns null if the creation fails.
     *
     * @param string $phrase the reason phrase
     *
     * @return ?static new instance, or null when reason phrase was not recognized
     */
    public function tryFromReasonPhrase(string $phrase): ?static;
}
