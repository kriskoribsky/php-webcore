<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Abstract\Data;

/**
 * @see MediaTypeExtensionInterface
 */
trait MediaTypeExtensionTrait
{
    /**
     * Mapping of supported extensions to its media types.
     */
    private const MEDIA_TYPE_EXTENSIONS = [
        'application/epub+zip' => 'epub',
        'application/gzip' => 'gz',
        'application/java-archive' => 'jar',
        'application/json' => 'json',
        'application/ld+json' => 'jsonld',
        'application/octet-stream' => 'bin',
        'application/ogg' => 'ogx',
        'application/pdf' => 'pdf',
        'application/rtf' => 'rtf',
        'application/vnd.amazon.ebook' => 'azw',
        'application/vnd.apple.installer+xml' => 'mpkg',
        'application/vnd.mozilla.xul+xml' => 'xul',
        'application/msword' => 'doc',
        'application/vnd.ms-excel' => 'xls',
        'application/vnd.ms-powerpoint' => 'ppt',
        'application/vnd.ms-fontobject' => 'eot',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
        'application/vnd.oasis.opendocument.text' => 'odt',
        'application/vnd.oasis.opendocument.spreadsheet' => 'ods',
        'application/vnd.oasis.opendocument.presentation' => 'odp',
        'application/x-abiword' => 'abw',
        'application/vnd.rar' => 'rar',
        'application/vnd.visio' => 'vsd',
        'application/x-7z-compressed' => '7z',
        'application/x-bzip' => 'bz',
        'application/x-bzip2' => 'bz2',
        'application/x-cdf' => 'cda',
        'application/x-csh' => 'csh',
        'application/x-freearc' => 'arc',
        'application/x-httpd-php' => 'php',
        'application/x-sh' => 'sh',
        'application/x-tar' => 'tar',
        'application/xhtml+xml' => 'xhtml',
        'application/xml' => 'xml',
        'application/zip' => 'zip',

        'audio/3gpp' => '3gp',
        'audio/3gpp2' => '3g2',
        'audio/aac' => 'aac',
        'audio/midi' => 'midi',
        'audio/mpeg' => 'mp3',
        'audio/ogg' => 'oga',
        'audio/opus' => 'opus',
        'audio/wav' => 'wav',
        'audio/webm' => 'weba',
        'audio/x-midi' => 'midi',

        'font/otf' => 'otf',
        'font/ttf' => 'ttf',
        'font/woff' => 'woff',
        'font/woff2' => 'woff2',

        'image/avif' => 'avif',
        'image/bmp' => 'bmp',
        'image/gif' => 'gif',
        'image/jpeg' => 'jpeg',
        'image/png' => 'png',
        'image/svg+xml' => 'svg',
        'image/tiff' => 'tiff',
        'image/vnd.microsoft.icon' => 'ico',
        'image/webp' => 'webp',

        'text/calendar' => 'ics',
        'text/css' => 'css',
        'text/csv' => 'csv',
        'text/html' => 'html',
        'text/javascript' => 'js',
        'text/plain' => 'txt',

        'video/3gpp' => '3gp',
        'video/3gpp2' => '3g2',
        'video/mp2t' => 'ts',
        'video/mp4' => 'mp4',
        'video/mpeg' => 'mpeg',
        'video/ogg' => 'ogv',
        'video/webm' => 'webm',
        'video/x-msvideo' => 'avi',
    ];
}
