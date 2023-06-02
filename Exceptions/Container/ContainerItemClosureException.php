<?php declare(strict_types=1);

namespace App\Exceptions\Container;

use App\Enums\HttpStatus;
use App\Enums\InternalStatus;
use App\Exceptions\BaseException;
use App\Interfaces\ExceptionInterface;

class ContainerItemClosureException extends BaseException implements ExceptionInterface
{
    public function __construct(
        string $message = 'Closure of container item is null',
        HttpStatus $http = HttpStatus::HTTP_INTERNAL_SERVER_ERROR,
        InternalStatus $internal = InternalStatus::ERROR_CONTAINER,
        ExceptionInterface $previous = null,
    ) {
        parent::__construct($message, $http, $internal, $previous);
    }
}