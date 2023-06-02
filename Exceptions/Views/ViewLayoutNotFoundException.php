<?php declare(strict_types=1);

namespace App\Exceptions\Views;

use App\Enums\HttpStatus;
use App\Enums\InternalStatus;
use App\Exceptions\BaseException;
use App\Interfaces\ExceptionInterface;

class ViewLayoutNotFoundException extends BaseException implements ExceptionInterface
{
    public function __construct(
        string $message = 'Layout not found',
        HttpStatus $http = HttpStatus::HTTP_NOT_IMPLEMENTED,
        InternalStatus $internal = InternalStatus::ERROR_LAYOUT_MISSING,
        ExceptionInterface $previous = null,
    ) {
        parent::__construct($message, $http, $internal, $previous);
    }
}