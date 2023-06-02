<?php declare(strict_types=1);

namespace App\Exceptions\Request;

use App\Enums\HttpStatus;
use App\Enums\InternalStatus;
use App\Exceptions\BaseException;
use App\Interfaces\ExceptionInterface;

class RequestDataNotSetException extends BaseException implements ExceptionInterface
{
    public function __construct(
        string $message = 'Request data not set',
        HttpStatus $http = HttpStatus::HTTP_INTERNAL_SERVER_ERROR,
        InternalStatus $internal = InternalStatus::ERROR_REQUEST,
        ExceptionInterface $previous = null,
    ) {
        parent::__construct($message, $http, $internal, $previous);
    }
}