<?php declare(strict_types=1);

namespace App\Exceptions\Container;

use App\Enums\HttpStatus;
use App\Enums\InternalStatus;
use App\Exceptions\BaseException;
use App\Interfaces\ExceptionInterface;
use Psr\Container\ContainerExceptionInterface;

class ContainerResolveDependencyException extends BaseException implements ExceptionInterface, ContainerExceptionInterface
{
    public function __construct(
        string $message = 'Error trying to resolve item dependencies',
        HttpStatus $http = HttpStatus::HTTP_INTERNAL_SERVER_ERROR,
        InternalStatus $internal = InternalStatus::ERROR_CONTAINER,
        ExceptionInterface $previous = null,
    ) {
        parent::__construct($message, $http, $internal, $previous);
    }
}