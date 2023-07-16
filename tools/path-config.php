<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// General
$dirRoot = \realpath(\dirname(__DIR__));
$dirSrc = \realpath($dirRoot . \DIRECTORY_SEPARATOR . 'src');
$dirOut = $dirRoot . \DIRECTORY_SEPARATOR . 'out';

// PHP CS Fixer
$dirCache = $dirOut . \DIRECTORY_SEPARATOR . 'formatters' . \DIRECTORY_SEPARATOR . '.php-cs-fixer.cache';
