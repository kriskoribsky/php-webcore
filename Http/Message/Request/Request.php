<?php

declare(strict_types=1);

namespace App\Core;

use App\Enums\RequestMethod;
use App\Exceptions\Request\RequestDataNotSetException;
use App\Exceptions\Request\RequestInvalidMethodException;

class Request
{
    private string $uri;
    private RequestMethod $method;

    public function set_uri(string $uri): void
    {
        $this->uri = $uri;
    }

    public function set_method(string $method): void
    {
        $this->method = RequestMethod::tryFrom($method);

        if ($this->method === null) {
            throw new RequestInvalidMethodException("Request Method '$method' is not recognized");
        }
    }

    public function get_uri(): string
    {
        if (isset($this->uri)) {
            return $this->uri;
        }

        throw new RequestDataNotSetException('Uri not set');
    }

    public function get_method(): RequestMethod
    {
        if (isset($this->method)) {
            return $this->method;
        }

        throw new RequestDataNotSetException('Method not set');
    }
}