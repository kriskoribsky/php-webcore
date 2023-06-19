<?php declare(strict_types=1);

namespace App\Enums;

enum InternalStatus: int
{
    /* Critical errors (1100 – 1199) */
    case ERROR_APP = 1100;
    case ERROR_CONFIG = 1101;
    case ERROR_REQUEST = 1102;
    case ERROR_ROUTER = 1103;
    case ERROR_DATABASE = 1104;
    case ERROR_CONTAINER = 1105;

    /* Model errors (1200 - 1299) */

    /* View errors (1300 - 1399) */
    case ERROR_VIEW_MISSING = 1300;
    case ERROR_LAYOUT_MISSING = 1301;

    /* Controller errors (1400 - 1499) */

    /* Service errors (1500 - 1599) */

    /* General errors (1900 - 1999) */
    case ERROR_UNEXPECTED = 1900;
}
