<?php declare(strict_types=1);

namespace App\Interfaces;

use App\Enums\HttpStatus;
use App\Enums\InternalStatus;

interface ExceptionInterface extends \Throwable
{
    public function __construct(
        string $message,
        HttpStatus $http,
        InternalStatus $interal,
        ExceptionInterface $previous = null,
    );
    public function getHttpStatus(): HttpStatus;
    public function getInternalStatus(): InternalStatus;
}
