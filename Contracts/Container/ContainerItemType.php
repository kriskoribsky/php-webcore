<?php declare(strict_types=1);

namespace App\Enums;

enum ContainerItemType
{
    case BIND;
    case SINGLETON;
    case INSTANCE;
    case INTERFACE;
}