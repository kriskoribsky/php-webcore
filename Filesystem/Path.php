<?php declare(strict_types=1);

class Path
{
    private function __construct()
    {
    }

    public static function build(string ...$segments): string
    {
        return join(DIRECTORY_SEPARATOR, $segments);
    }
}
