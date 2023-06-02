<?php declare(strict_types=1);

namespace App\Exceptions\Router;

use App\Enums\HttpStatus;
use App\Enums\InternalStatus;
use App\Exceptions\BaseException;
use App\Interfaces\ExceptionInterface;

class RouteNotFoundException extends BaseException implements ExceptionInterface
{
   public function __construct(
      string $message = 'Route not found',
      HttpStatus $http = HttpStatus::HTTP_NOT_FOUND,
      InternalStatus $internal = InternalStatus::ERROR_ROUTER,
      ExceptionInterface $previous = null,
   ) {
      parent::__construct($message, $http, $internal, $previous);
   }
}