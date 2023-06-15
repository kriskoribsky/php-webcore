<?php declare(strict_types=1);

namespace App\Core;

use App\Exceptions\Config\ConfigEmptyFileException;
use App\Exceptions\Config\ConfigPathNotFoundException;
use App\Exceptions\Config\ConfigInvalidOptionReadException;

class Config
{
    private array $options = [];

    public function load_ini(string $path): void
    {
        $this->add_options(parse_ini_file($path), $path);
    }

    public function load_yaml(string $path): void
    {
        // TODO: install YAML library & implement this function
    }

    private function add_options(array|false $parsed, string $path): void
    {
        if ($parsed === false) {
            throw new ConfigPathNotFoundException("Config file '$path' not found");
        }

        if (empty($parsed)) {
            throw new ConfigEmptyFileException("Config file '$path' is empty");
        }

        $this->options = array_merge($this->options, $parsed);
    }

    public function __get($name): mixed
    {
        if (isset($this->options[$name])) {
            return $this->options[$name];
        }

        throw new ConfigInvalidOptionReadException("Option '$name' does not exist");
    }
}
