<?php declare(strict_types=1);

namespace App\Exceptions\Config;

use App\Enums\HttpStatus;
use App\Enums\InternalStatus;
use App\Exceptions\BaseException;
use App\Interfaces\ExceptionInterface;

class ConfigPathNotFoundException extends BaseException implements ExceptionInterface
{
    public function __construct(
        string $message = 'Configuration file was not found',
        HttpStatus $http = HttpStatus::HTTP_INTERNAL_SERVER_ERROR,
        InternalStatus $internal = InternalStatus::ERROR_CONFIG,
        ExceptionInterface $previous = null,
    ) {
        parent::__construct($message, $http, $internal, $previous);
    }
}