<?php declare(strict_types=1);

/*
 * This file is part of the Webcore package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Abstract\Data;

/**
 * HTTP uses media types in the Content-Type and Accept header fields
 * in order to provide open and extensible data typing and type negotiation.
 * Media types define both a data format and various processing models:
 * how to process that data in accordance with the message context.
 *
 * This interface includes non-exhaustive list of constants for the most common
 * media types with corresponding document types, ordered alphabetically.
 *
 * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-media-type
 * @see https://www.iana.org/assignments/media-types/media-types.xhtml
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types
 */
interface MediaTypeInterface
{
    /**
     * Electronic publication (EPUB)
     * extension: '.epub'.
     */
    public const APPLICATION_EPUB_ZIP = 'application/epub+zip';

    /**
     * GZip Compressed Archive
     * extension: '.gz'.
     */
    public const APPLICATION_GZIP = 'application/gzip';

    /**
     * Java Archive (JAR)
     * extension: '.jar'.
     */
    public const APPLICATION_JAR = 'application/java-archive';

    /**
     * JSON format
     * extension: '.json'.
     */
    public const APPLICATION_JSON = 'application/json';

    /**
     * JSON-LD format
     * extension: '.jsonld'.
     */
    public const APPLICATION_JSON_LD = 'application/ld+json';

    /**
     * Any kind of binary data
     * extension: '.bin'.
     */
    public const APPLICATION_OCTET_STREAM = 'application/octet-stream';

    /**
     * OGG
     * extension: '.ogx'.
     */
    public const APPLICATION_OGG = 'application/ogg';

    /**
     * Adobe Portable Document Format (PDF)
     * extension: '.pdf'.
     */
    public const APPLICATION_PDF = 'application/pdf';

    /**
     * Rich Text Format (RTF)
     * extension: '.rtf'.
     */
    public const APPLICATION_RTF = 'application/rtf';

    /**
     * Amazon Kindle eBook format
     * extension: '.azw'.
     */
    public const APPLICATION_AMAZON_EBOOK = 'application/vnd.amazon.ebook';

    /**
     * Apple Installer Package
     * extension: '.mpkg'.
     */
    public const APPLICATION_APPLE_INSTALLER = 'application/vnd.apple.installer+xml';

    /**
     * XUL
     * extension: '.xul'.
     */
    public const APPLICATION_MOZILLA_XUL = 'application/vnd.mozilla.xul+xml';

    /**
     * Microsoft Word
     * extension: '.doc'.
     */
    public const APPLICATION_MS_WORD = 'application/msword';

    /**
     * Microsoft Excel
     * extension: '.xls'.
     */
    public const APPLICATION_MS_EXCEL = 'application/vnd.ms-excel';

    /**
     * Microsoft PowerPoint
     * extension: '.ppt'.
     */
    public const APPLICATION_MS_POWERPOINT = 'application/vnd.ms-powerpoint';

    /**
     * MS Embedded OpenType fonts
     * extension: '.eot'.
     */
    public const APPLICATION_MS_FONTOBJECT = 'application/vnd.ms-fontobject';

    /**
     * Microsoft Word (OpenXML)
     * extension: '.docx'.
     */
    public const APPLICATION_MS_WORD_X = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';

    /**
     * Microsoft Excel (OpenXML)
     * extension: '.xlsx'.
     */
    public const APPLICATION_MS_EXCEL_X = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';

    /**
     * Microsoft PowerPoint (OpenXML)
     * extension: '.pptx'.
     */
    public const APPLICATION_MS_POWERPOINT_X = 'application/vnd.openxmlformats-officedocument.presentationml.presentation';

    /**
     * OpenDocument text document
     * extension: '.odt'.
     */
    public const APPLICATION_OD_TEXT = 'application/vnd.oasis.opendocument.text';

    /**
     * OpenDocument spreadsheet document
     * extension: '.ods'.
     */
    public const APPLICATION_OD_SPREADSHEET = 'application/vnd.oasis.opendocument.spreadsheet';

    /**
     * OpenDocument presentation document
     * extension: '.odp'.
     */
    public const APPLICATION_OD_PRESENTATION = 'application/vnd.oasis.opendocument.presentation';

    /**
     * AbiWord document
     * extension: '.abw'.
     */
    public const APPLICATION_ABIWORD_X = 'application/x-abiword';

    /**
     * RAR archive
     * extension: '.rar'.
     */
    public const APPLICATION_VND_RAR = 'application/vnd.rar';

    /**
     * Microsoft Visio
     * extension: '.vsd'.
     */
    public const APPLICATION_VND_VISIO = 'application/vnd.visio';

    /**
     * 7-zip archive
     * extension: '.7z'.
     */
    public const APPLICATION_7Z_X = 'application/x-7z-compressed';

    /**
     * BZip archive
     * extension: '.bz'.
     */
    public const APPLICATION_BZIP_X = 'application/x-bzip';

    /**
     * BZip2 archive
     * extension: '.bz2'.
     */
    public const APPLICATION_BZIP2_X = 'application/x-bzip2';

    /**
     * CD audio
     * extension: '.cda'.
     */
    public const APPLICATION_CDF_X = 'application/x-cdf';

    /**
     * C-Shell script
     * extension: '.csh'.
     */
    public const APPLICATION_CSH_X = 'application/x-csh';

    /**
     * Archive document (multiple files embedded)
     * extension: '.arc'.
     */
    public const APPLICATION_FREEARC_X = 'application/x-freearc';

    /**
     * Hypertext Preprocessor (Personal Home Page)
     * extension: '.php'.
     */
    public const APPLICATION_PHP_X = 'application/x-httpd-php';

    /**
     * Bourne shell script
     * extension: '.sh'.
     */
    public const APPLICATION_SH_X = 'application/x-sh';

    /**
     * Tape Archive (TAR)
     * extension: '.tar'.
     */
    public const APPLICATION_TAR_X = 'application/x-tar';

    /**
     * XHTML
     * extension: '.xhtml'.
     */
    public const APPLICATION_HTML_X = 'application/xhtml+xml';

    /**
     * XML
     * extension: '.xml'.
     */
    public const APPLICATION_XML = 'application/xml';

    /**
     * ZIP archive
     * extension: '.zip'.
     */
    public const APPLICATION_ZIP = 'application/zip';

    /**
     * 3GPP audio container
     * extension: '.3gp'.
     */
    public const AUDIO_3GPP = 'audio/3gpp';

    /**
     * 3GPP2 audio container
     * extension: '.3g2'.
     */
    public const AUDIO_3GPP2 = 'audio/3gpp2';

    /**
     * AAC audio
     * extension: '.aac'.
     */
    public const AUDIO_AAC = 'audio/aac';

    /**
     * Musical Instrument Digital Interface (MIDI)
     * extension: '.mid, .midi'.
     */
    public const AUDIO_MIDI = 'audio/midi';

    /**
     * MP3 audio
     * extension: '.mp3'.
     */
    public const AUDIO_MPEG = 'audio/mpeg';

    /**
     * OGG audio
     * extension: '.oga'.
     */
    public const AUDIO_OGG = 'audio/ogg';

    /**
     * Opus audio
     * extension: '.opus'.
     */
    public const AUDIO_OPUS = 'audio/opus';

    /**
     * Waveform Audio Format
     * extension: '.wav'.
     */
    public const AUDIO_WAV = 'audio/wav';

    /**
     * WEBM audio
     * extension: '.weba'.
     */
    public const AUDIO_WEBM = 'audio/webm';

    /**
     * Musical Instrument Digital Interface (MIDI)
     * extension: '.mid, .midi'.
     */
    public const AUDIO_MIDI_X = 'audio/x-midi';

    /**
     * OpenType font
     * extension: '.otf'.
     */
    public const FONT_OTF = 'font/otf';

    /**
     * TrueType Font
     * extension: '.ttf'.
     */
    public const FONT_TTF = 'font/ttf';

    /**
     * Web Open Font Format (WOFF)
     * extension: '.woff'.
     */
    public const FONT_WOFF = 'font/woff';

    /**
     * Web Open Font Format (WOFF)
     * extension: '.woff2'.
     */
    public const FONT_WOFF2 = 'font/woff2';

    /**
     * AVIF image
     * extension: '.avif'.
     */
    public const IMAGE_AVIF = 'image/avif';

    /**
     * Windows OS/2 Bitmap Graphics
     * extension: '.bmp'.
     */
    public const IMAGE_BMP = 'image/bmp';

    /**
     * Graphics Interchange Format (GIF)
     * extension: '.gif'.
     */
    public const IMAGE_GIF = 'image/gif';

    /**
     * JPEG images
     * extension: '.jpeg, .jpg'.
     */
    public const IMAGE_JPEG = 'image/jpeg';

    /**
     * Portable Network Graphics
     * extension: '.png'.
     */
    public const IMAGE_PNG = 'image/png';

    /**
     * Scalable Vector Graphics (SVG)
     * extension: '.svg'.
     */
    public const IMAGE_SVG = 'image/svg+xml';

    /**
     * Tagged Image File Format (TIFF)
     * extension: '.tif, .tiff'.
     */
    public const IMAGE_TIFF = 'image/tiff';

    /**
     * Icon format
     * extension: '.ico'.
     */
    public const IMAGE_ICO = 'image/vnd.microsoft.icon';

    /**
     * WEBP image
     * extension: '.webp'.
     */
    public const IMAGE_WEBP = 'image/webp';

    /**
     * iCalendar format
     * extension: '.ics'.
     */
    public const TEXT_CALENDAR = 'text/calendar';

    /**
     * Cascading Style Sheets (CSS)
     * extension: '.css'.
     */
    public const TEXT_CSS = 'text/css';

    /**
     * Comma-separated values (CSV)
     * extension: '.csv'.
     */
    public const TEXT_CSV = 'text/csv';

    /**
     * HyperText Markup Language (HTML)
     * extension: '.htm, .html'.
     */
    public const TEXT_HTML = 'text/html';

    /**
     * JavaScript, JavaScript module
     * extension: '.js, .mjs'.
     */
    public const TEXT_JAVASCRIPT = 'text/javascript';

    /**
     * Text, (generally ASCII or ISO 8859-n)
     * extension: '.txt'.
     */
    public const TEXT_PLAIN = 'text/plain';

    /**
     * 3GPP video container
     * extension: '.3gp'.
     */
    public const VIDEO_3GPP = 'video/3gpp';

    /**
     * 3GPP2 video container
     * extension: '.3g2'.
     */
    public const VIDEO_3GPP2 = 'video/3gpp2';

    /**
     * MPEG transport stream
     * extension: '.ts'.
     */
    public const VIDEO_MP2T = 'video/mp2t';

    /**
     * MP4 video
     * extension: '.mp4'.
     */
    public const VIDEO_MP4 = 'video/mp4';

    /**
     * MPEG Video
     * extension: '.mpeg'.
     */
    public const VIDEO_MPEG = 'video/mpeg';

    /**
     * OGG video
     * extension: '.ogv'.
     */
    public const VIDEO_OGG = 'video/ogg';

    /**
     * WEBM video
     * extension: '.webm'.
     */
    public const VIDEO_WEBM = 'video/webm';

    /**
     * AVI: Audio Video Interleave
     * extension: '.avi'.
     */
    public const VIDEO_MSVIDEO_X = 'video/x-msvideo';
}
