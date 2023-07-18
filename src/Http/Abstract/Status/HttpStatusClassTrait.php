<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Abstract\Status;

/**
 * @see HttpStatusClassInterface
 */
trait HttpStatusClassTrait
{
    /**
     * {@inheritDoc}
     */
    public function isInformational(): bool
    {
        // @phpstan-ignore-next-line
        return $this->value >= 100 && $this->value < 200;
    }

    /**
     * {@inheritDoc}
     */
    public function isSuccessful(): bool
    {
        return $this->value >= 200 && $this->value < 300;
    }

    /**
     * {@inheritDoc}
     */
    public function isRedirection(): bool
    {
        return $this->value >= 300 && $this->value < 400;
    }

    /**
     * {@inheritDoc}
     */
    public function isClientError(): bool
    {
        return $this->value >= 400 && $this->value < 500;
    }

    /**
     * {@inheritDoc}
     */
    public function isServerError(): bool
    {
        // @phpstan-ignore-next-line
        return $this->value >= 500 && $this->value < 600;
    }
}
