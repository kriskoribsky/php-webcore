<?php declare(strict_types=1);

class Debug
{
    private function __construct()
    {
    }

    public static function print(mixed ...$vars): void
    {
        foreach ($vars as $var) {
            self::output_var(is_object($var) || is_array($var) ? 'print_r' : 'var_dump', $var);
        }
    }

    public static function dump(mixed ...$vars): void
    {
        foreach ($vars as $var) {
            self::output_var('var_dump', $var);
        }
    }

    public static function print_exit(mixed ...$vars): void
    {
        self::print(...$vars);
        self::output_exit(__METHOD__);
        exit();
    }

    public static function dump_exit(mixed ...$vars): void
    {
        self::dump(...$vars);
        self::output_exit(__METHOD__);
        exit();
    }

    private static function output_var(callable $func, mixed $var): void
    {
        echo <<<HTML
        <pre style="text-align:left; font-size:12px">
        <fieldset style="border: 2px groove red; padding: 0 1rem 1rem">
        <legend style="color: red; font-weight: bold">Debug</legend>
        HTML;

        ob_start();
        $func($var);
        echo htmlentities(ob_get_clean());

        echo <<<HTML
        </fieldset>
        </pre>
        HTML;
    }

    private static function output_exit(string $method): void
    {
        echo <<<HTML
        <pre style="text-align:left; font-size:12px">
        <u>Exit called from:</u>
        <div style="padding: 0.4rem 2rem">
        HTML;

        debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);

        echo <<<HTML
        </div>
        <strong>Execution explicitly terminated using <em>$method</em> method.</strong>
        </pre>
        HTML;
    }
}
