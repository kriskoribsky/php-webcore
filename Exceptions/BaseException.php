<?php declare(strict_types=1);

namespace App\Exceptions;

use App\Enums\HttpStatus;
use App\Enums\InternalStatus;
use App\Interfaces\ExceptionInterface;

class BaseException extends \Exception implements ExceptionInterface
{
    protected HttpStatus $http;
    protected InternalStatus $internal;

    public function __construct(
        string $message,
        HttpStatus $http = HttpStatus::HTTP_INTERNAL_SERVER_ERROR,
        InternalStatus $internal = InternalStatus::ERROR_UNEXPECTED,
        ExceptionInterface $previous = null
    ) {
        $this->http = $http;
        $this->internal = $internal;

        parent::__construct($message, 0, $previous);
    }

    public function getHttpStatus(): HttpStatus
    {
        return $this->http;
    }

    public function getInternalStatus(): InternalStatus
    {
        return $this->internal;
    }
}

// Child exception tamplate
// ================================================================================

/* <?php declare(strict_types=1);
namespace ;
use App\Enums\HttpStatus;
use App\Enums\InternalStatus;
use App\Exceptions\BaseException;
use App\Interfaces\ExceptionInterface;
class extends BaseException implements ExceptionInterface
{
public function __construct(
string $message = ,
HttpStatus $http = HttpStatus::,
InternalStatus $internal = InternalStatus::,
ExceptionInterface $previous = null,
) {
parent::__construct($message, $http, $internal, $previous);
}
} */