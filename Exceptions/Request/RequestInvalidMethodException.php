<?php declare(strict_types=1);

namespace App\Exceptions\Request;

use App\Enums\HttpStatus;
use App\Enums\InternalStatus;
use App\Exceptions\BaseException;
use App\Interfaces\ExceptionInterface;

class RequestInvalidMethodException extends BaseException implements ExceptionInterface
{
    public function __construct(
        string $message = 'Request method is not recognized',
        HttpStatus $http = HttpStatus::HTTP_BAD_REQUEST,
        InternalStatus $internal = InternalStatus::ERROR_ROUTER,
        ExceptionInterface $previous = null,
    ) {
        parent::__construct($message, $http, $internal, $previous);
    }
}