<?php declare(strict_types=1);

namespace App\Enums;

enum RequestMethod: string
{
    case GET = 'GET'; // retrieve a resource
    case POST = 'POST'; // submit an entity to a resource
    case PUT = 'PUT'; // replace or update a resource with a new entity
    case DELETE = 'DELETE'; // delete a resource
    case PATCH = 'PATCH'; // partially update a resource
    case HEAD = 'HEAD'; // retrieve the headers for a resource
    case OPTIONS = 'OPTIONS'; // retrieve the supported methods for a resource
}