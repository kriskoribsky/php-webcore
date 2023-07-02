<?php declare(strict_types=1);

/*
 * This file is part of the Webutils package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Abstract\Data;

use Web\Utils\Http\Exception\UnsupportedExtensionException;

/**
 * Enum equivalent of MediaTypeInterface.
 *
 * @see MediaTypeInterface
 */
enum MediaType: string implements MediaTypeExtensionInterface
{
    use MediaTypeExtensionTrait;

    /**
     * Electronic publication (EPUB)
     * extension: '.epub'.
     */
    case APPLICATION_EPUB_ZIP = 'application/epub+zip';

    /**
     * GZip Compressed Archive
     * extension: '.gz'.
     */
    case APPLICATION_GZIP = 'application/gzip';

    /**
     * Java Archive (JAR)
     * extension: '.jar'.
     */
    case APPLICATION_JAR = 'application/java-archive';

    /**
     * JSON format
     * extension: '.json'.
     */
    case APPLICATION_JSON = 'application/json';

    /**
     * JSON-LD format
     * extension: '.jsonld'.
     */
    case APPLICATION_JSON_LD = 'application/ld+json';

    /**
     * Any kind of binary data
     * extension: '.bin'.
     */
    case APPLICATION_OCTET_STREAM = 'application/octet-stream';

    /**
     * OGG
     * extension: '.ogx'.
     */
    case APPLICATION_OGG = 'application/ogg';

    /**
     * Adobe Portable Document Format (PDF)
     * extension: '.pdf'.
     */
    case APPLICATION_PDF = 'application/pdf';

    /**
     * Rich Text Format (RTF)
     * extension: '.rtf'.
     */
    case APPLICATION_RTF = 'application/rtf';

    /**
     * Amazon Kindle eBook format
     * extension: '.azw'.
     */
    case APPLICATION_AMAZON_EBOOK = 'application/vnd.amazon.ebook';

    /**
     * Apple Installer Package
     * extension: '.mpkg'.
     */
    case APPLICATION_APPLE_INSTALLER = 'application/vnd.apple.installer+xml';

    /**
     * XUL
     * extension: '.xul'.
     */
    case APPLICATION_MOZILLA_XUL = 'application/vnd.mozilla.xul+xml';

    /**
     * Microsoft Word
     * extension: '.doc'.
     */
    case APPLICATION_MS_WORD = 'application/msword';

    /**
     * Microsoft Excel
     * extension: '.xls'.
     */
    case APPLICATION_MS_EXCEL = 'application/vnd.ms-excel';

    /**
     * Microsoft PowerPoint
     * extension: '.ppt'.
     */
    case APPLICATION_MS_POWERPOINT = 'application/vnd.ms-powerpoint';

    /**
     * MS Embedded OpenType fonts
     * extension: '.eot'.
     */
    case APPLICATION_MS_FONTOBJECT = 'application/vnd.ms-fontobject';

    /**
     * Microsoft Word (OpenXML)
     * extension: '.docx'.
     */
    case APPLICATION_MS_WORD_X = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';

    /**
     * Microsoft Excel (OpenXML)
     * extension: '.xlsx'.
     */
    case APPLICATION_MS_EXCEL_X = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';

    /**
     * Microsoft PowerPoint (OpenXML)
     * extension: '.pptx'.
     */
    case APPLICATION_MS_POWERPOINT_X = 'application/vnd.openxmlformats-officedocument.presentationml.presentation';

    /**
     * OpenDocument text document
     * extension: '.odt'.
     */
    case APPLICATION_OD_TEXT = 'application/vnd.oasis.opendocument.text';

    /**
     * OpenDocument spreadsheet document
     * extension: '.ods'.
     */
    case APPLICATION_OD_SPREADSHEET = 'application/vnd.oasis.opendocument.spreadsheet';

    /**
     * OpenDocument presentation document
     * extension: '.odp'.
     */
    case APPLICATION_OD_PRESENTATION = 'application/vnd.oasis.opendocument.presentation';

    /**
     * AbiWord document
     * extension: '.abw'.
     */
    case APPLICATION_ABIWORD_X = 'application/x-abiword';

    /**
     * RAR archive
     * extension: '.rar'.
     */
    case APPLICATION_VND_RAR = 'application/vnd.rar';

    /**
     * Microsoft Visio
     * extension: '.vsd'.
     */
    case APPLICATION_VND_VISIO = 'application/vnd.visio';

    /**
     * 7-zip archive
     * extension: '.7z'.
     */
    case APPLICATION_7Z_X = 'application/x-7z-compressed';

    /**
     * BZip archive
     * extension: '.bz'.
     */
    case APPLICATION_BZIP_X = 'application/x-bzip';

    /**
     * BZip2 archive
     * extension: '.bz2'.
     */
    case APPLICATION_BZIP2_X = 'application/x-bzip2';

    /**
     * CD audio
     * extension: '.cda'.
     */
    case APPLICATION_CDF_X = 'application/x-cdf';

    /**
     * C-Shell script
     * extension: '.csh'.
     */
    case APPLICATION_CSH_X = 'application/x-csh';

    /**
     * Archive document (multiple files embedded)
     * extension: '.arc'.
     */
    case APPLICATION_FREEARC_X = 'application/x-freearc';

    /**
     * Hypertext Preprocessor (Personal Home Page)
     * extension: '.php'.
     */
    case APPLICATION_PHP_X = 'application/x-httpd-php';

    /**
     * Bourne shell script
     * extension: '.sh'.
     */
    case APPLICATION_SH_X = 'application/x-sh';

    /**
     * Tape Archive (TAR)
     * extension: '.tar'.
     */
    case APPLICATION_TAR_X = 'application/x-tar';

    /**
     * XHTML
     * extension: '.xhtml'.
     */
    case APPLICATION_HTML_X = 'application/xhtml+xml';

    /**
     * XML
     * extension: '.xml'.
     */
    case APPLICATION_XML = 'application/xml';

    /**
     * ZIP archive
     * extension: '.zip'.
     */
    case APPLICATION_ZIP = 'application/zip';

    /**
     * 3GPP audio container
     * extension: '.3gp'.
     */
    case AUDIO_3GPP = 'audio/3gpp';

    /**
     * 3GPP2 audio container
     * extension: '.3g2'.
     */
    case AUDIO_3GPP2 = 'audio/3gpp2';

    /**
     * AAC audio
     * extension: '.aac'.
     */
    case AUDIO_AAC = 'audio/aac';

    /**
     * Musical Instrument Digital Interface (MIDI)
     * extension: '.mid, .midi'.
     */
    case AUDIO_MIDI = 'audio/midi';

    /**
     * MP3 audio
     * extension: '.mp3'.
     */
    case AUDIO_MPEG = 'audio/mpeg';

    /**
     * OGG audio
     * extension: '.oga'.
     */
    case AUDIO_OGG = 'audio/ogg';

    /**
     * Opus audio
     * extension: '.opus'.
     */
    case AUDIO_OPUS = 'audio/opus';

    /**
     * Waveform Audio Format
     * extension: '.wav'.
     */
    case AUDIO_WAV = 'audio/wav';

    /**
     * WEBM audio
     * extension: '.weba'.
     */
    case AUDIO_WEBM = 'audio/webm';

    /**
     * Musical Instrument Digital Interface (MIDI)
     * extension: '.mid, .midi'.
     */
    case AUDIO_MIDI_X = 'audio/x-midi';

    /**
     * OpenType font
     * extension: '.otf'.
     */
    case FONT_OTF = 'font/otf';

    /**
     * TrueType Font
     * extension: '.ttf'.
     */
    case FONT_TTF = 'font/ttf';

    /**
     * Web Open Font Format (WOFF)
     * extension: '.woff'.
     */
    case FONT_WOFF = 'font/woff';

    /**
     * Web Open Font Format (WOFF)
     * extension: '.woff2'.
     */
    case FONT_WOFF2 = 'font/woff2';

    /**
     * AVIF image
     * extension: '.avif'.
     */
    case IMAGE_AVIF = 'image/avif';

    /**
     * Windows OS/2 Bitmap Graphics
     * extension: '.bmp'.
     */
    case IMAGE_BMP = 'image/bmp';

    /**
     * Graphics Interchange Format (GIF)
     * extension: '.gif'.
     */
    case IMAGE_GIF = 'image/gif';

    /**
     * JPEG images
     * extension: '.jpeg, .jpg'.
     */
    case IMAGE_JPEG = 'image/jpeg';

    /**
     * Portable Network Graphics
     * extension: '.png'.
     */
    case IMAGE_PNG = 'image/png';

    /**
     * Scalable Vector Graphics (SVG)
     * extension: '.svg'.
     */
    case IMAGE_SVG = 'image/svg+xml';

    /**
     * Tagged Image File Format (TIFF)
     * extension: '.tif, .tiff'.
     */
    case IMAGE_TIFF = 'image/tiff';

    /**
     * Icon format
     * extension: '.ico'.
     */
    case IMAGE_ICO = 'image/vnd.microsoft.icon';

    /**
     * WEBP image
     * extension: '.webp'.
     */
    case IMAGE_WEBP = 'image/webp';

    /**
     * iCalendar format
     * extension: '.ics'.
     */
    case TEXT_CALENDAR = 'text/calendar';

    /**
     * Cascading Style Sheets (CSS)
     * extension: '.css'.
     */
    case TEXT_CSS = 'text/css';

    /**
     * Comma-separated values (CSV)
     * extension: '.csv'.
     */
    case TEXT_CSV = 'text/csv';

    /**
     * HyperText Markup Language (HTML)
     * extension: '.htm, .html'.
     */
    case TEXT_HTML = 'text/html';

    /**
     * JavaScript, JavaScript module
     * extension: '.js, .mjs'.
     */
    case TEXT_JAVASCRIPT = 'text/javascript';

    /**
     * Text, (generally ASCII or ISO 8859-n)
     * extension: '.txt'.
     */
    case TEXT_PLAIN = 'text/plain';

    /**
     * 3GPP video container
     * extension: '.3gp'.
     */
    case VIDEO_3GPP = 'video/3gpp';

    /**
     * 3GPP2 video container
     * extension: '.3g2'.
     */
    case VIDEO_3GPP2 = 'video/3gpp2';

    /**
     * MPEG transport stream
     * extension: '.ts'.
     */
    case VIDEO_MP2T = 'video/mp2t';

    /**
     * MP4 video
     * extension: '.mp4'.
     */
    case VIDEO_MP4 = 'video/mp4';

    /**
     * MPEG Video
     * extension: '.mpeg'.
     */
    case VIDEO_MPEG = 'video/mpeg';

    /**
     * OGG video
     * extension: '.ogv'.
     */
    case VIDEO_OGG = 'video/ogg';

    /**
     * WEBM video
     * extension: '.webm'.
     */
    case VIDEO_WEBM = 'video/webm';

    /**
     * AVI: Audio Video Interleave
     * extension: '.avi'.
     */
    case VIDEO_MSVIDEO_X = 'video/x-msvideo';

    /**
     * {@inheritDoc}
     */
    public function getFileExtension(): string
    {
        return self::MEDIA_TYPE_EXTENSIONS[$this->value];
    }

    /**
     * {@inheritDoc}
     */
    public static function fromFilePath(string $path): static
    {
        $path = \trim($path, ". \n\r\t\v\x00");

        // add '.' if $path doesn't contain any to recognize standalone extensions
        if ( ! \str_contains($path, '.')) {
            $path = '.' . $path;
        }

        $ext = \pathinfo($path, \PATHINFO_EXTENSION);

        $result = \array_search($ext, self::MEDIA_TYPE_EXTENSIONS, true);

        if ($result === false) {
            throw new UnsupportedExtensionException('Extension is not supported.');
        }

        return self::from($result);
    }

    /**
     * {@inheritDoc}
     */
    public static function tryFromFilePath(string $path): ?static
    {
        try {
            $result = self::fromFilePath($path);
        } catch (UnsupportedExtensionException) {
            return null;
        }

        return $result;
    }
}
