<?php declare(strict_types=1);

namespace App\Core;

use \PDO;

class Database
{
    private PDO $pdo;

    public function __construct(Config $config)
    {
        $this->pdo = new PDO(
            $config->DB_DRIVER . ':host=' . $config->DB_HOST . ';dbname=' . $config->DB_DATABASE,
            $config->DB_USER,
            $config->DB_PASS,
            [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ],
        );
    }

    public function __call(string $method, array $args)
    {
        return $this->pdo->$method(...$args);
    }
}
