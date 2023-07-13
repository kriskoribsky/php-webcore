<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Test\Abstract\Method;

use PHPUnit\Framework\TestCase;
use Web\Utils\Http\Abstract\Method\HttpMethod;

/**
 * @internal
 *
 * @covers \Web\Utils\Http\Abstract\Method\HttpMethod
 *
 * @small
 */
final class HttpMethodTest extends TestCase
{
    public const GROUPS = [
        'SAFE' => ['GET', 'HEAD', 'OPTIONS', 'TRACE'],
        'IDEMPOTENT' => ['PUT', 'DELETE'],
        'CACHEABLE' => ['GET', 'HEAD', 'POST'],
    ];

    // Tests

    /**
     * @testdox Method $method is safe.
     *
     * @dataProvider provideSafeMethodCases
     */
    public function testIsSafeReturnsTrueForAllSafeMethods(string $method): void
    {
        $this->assertTrue(HttpMethod::from($method)->isSafe());
    }

    /**
     * @testdox Method $method is not safe.
     *
     * @dataProvider provideNonSafeMethodCases
     */
    public function testIsSafeReturnsFalseForNonSafeMethods(string $method): void
    {
        $this->assertFalse(HttpMethod::from($method)->isSafe());
    }

    /**
     * @testdox Method $method is idempotent.
     *
     * @dataProvider provideIdempotentMethodCases
     */
    public function testIsIdempotentReturnsTrueForAllIdempotentMethods(string $method): void
    {
        $this->assertTrue(HttpMethod::from($method)->isIdempotent());
    }

    /**
     * @testdox Method $method is not idempotent.
     *
     * @dataProvider provideNonIdempotentMethodCases
     */
    public function testIsIdempotentReturnsFalseForNonIdempotentMethods(string $method): void
    {
        $this->assertFalse(HttpMethod::from($method)->isIdempotent());
    }

    /**
     * @testdox Method $method is cacheable.
     *
     * @dataProvider provideCacheableMethodCases
     */
    public function testIsCacheableReturnsTrueForAllCacheableMethods(string $method): void
    {
        $this->assertTrue(HttpMethod::from($method)->isCacheable());
    }

    /**
     * @testdox Method $method is not cacheable.
     *
     * @dataProvider provideNonCacheableMethodCases
     */
    public function testIsCacheableReturnsFalseForNonCacheableMethods(string $method): void
    {
        $this->assertFalse(HttpMethod::from($method)->isCacheable());
    }

    // Data providers

    /**
     * @return iterable<iterable<string>>
     */
    public static function provideSafeMethodCases(): iterable
    {
        return \array_map(static fn (string $method): array => [$method], self::GROUPS['SAFE']);
    }

    /**
     * @return iterable<iterable<string>>
     */
    public static function provideNonSafeMethodCases(): iterable
    {
        $filtered = [];
        $all = \array_unique(\array_merge(self::GROUPS['IDEMPOTENT'], self::GROUPS['CACHEABLE']));

        foreach ($all as $method) {
            if ( ! \in_array($method, self::GROUPS['SAFE'], true)) {
                $filtered[] = [$method];
            }
        }

        return $filtered;
    }

    /**
     * @return iterable<iterable<string>>
     */
    public static function provideIdempotentMethodCases(): iterable
    {
        return \array_map(static fn (string $method): array => [$method], self::GROUPS['IDEMPOTENT']);
    }

    /**
     * @return iterable<iterable<string>>
     */
    public static function provideNonIdempotentMethodCases(): iterable
    {
        $filtered = [];
        $all = \array_unique(\array_merge(self::GROUPS['SAFE'], self::GROUPS['CACHEABLE']));

        foreach ($all as $method) {
            if ( ! \in_array($method, self::GROUPS['IDEMPOTENT'], true)) { // @phpstan-ignore-line
                $filtered[] = [$method];
            }
        }

        return $filtered;
    }

    /**
     * @return iterable<iterable<string>>
     */
    public static function provideCacheableMethodCases(): iterable
    {
        return \array_map(static fn (string $method): array => [$method], self::GROUPS['CACHEABLE']);
    }

    /**
     * @return iterable<iterable<string>>
     */
    public static function provideNonCacheableMethodCases(): iterable
    {
        $filtered = [];
        $all = \array_unique(\array_merge(self::GROUPS['SAFE'], self::GROUPS['IDEMPOTENT']));

        foreach ($all as $method) {
            if ( ! \in_array($method, self::GROUPS['CACHEABLE'], true)) {
                $filtered[] = [$method];
            }
        }

        return $filtered;
    }
}
