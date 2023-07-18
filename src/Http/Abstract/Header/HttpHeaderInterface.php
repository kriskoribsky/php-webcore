<?php declare(strict_types=1);

/*
 * This file is part of the ksoft-server-php/essentials package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Abstract\Header;

/**
 * HTTP headers let the client and the server pass additional information
 * with an HTTP request or response. An HTTP header consists of its
 * case-insensitive name followed by a colon (:), then by its value.
 *
 * This interfaces provides names for standard headers defined in IANA
 * list, as well as some common non-standrd ones.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers
 * @see https://en.wikipedia.org/wiki/List_of_HTTP_header_fields
 * @see https://www.holisticseo.digital/technical-seo/http-header/
 * @see https://www.iana.org/assignments/message-headers/message-headers.xml#perm-headers
 */
interface HttpHeaderInterface
{
    /**
     * Instance manipulations are acceptable for the request.
     *
     * @example - A-IM: feed
     */
    public const A_IM = 'A-IM';

    /**
     * Acceptable media types for responses.
     *
     * @example - Accept: text/html
     */
    public const ACCEPT = 'Accept';

    /**
     * Acceptable character sets.
     *
     * @example - Accept-Charset: utf-8
     */
    public const ACCEPT_CHARSET = 'Accept-Charset';

    /**
     * Acceptable times.
     *
     * @example - Accept-Datetime: Thu, 31 May 2007 20:35:00 GMT
     */
    public const ACCEPT_DATETIME = 'Accept-Datetime';

    /**
     * Acceptable encodings.
     *
     * @example - Accept-Encoding: gzip, deflate
     */
    public const ACCEPT_ENCODING = 'Accept-Encoding';

    /**
     * Acceptable human languages.
     *
     * @example - Accept-Language: en-US
     */
    public const ACCEPT_LANGUAGE = 'Accept-Language';

    /**
     * Requests can be performed across origins while sharing the origin.
     *
     * @example - Access-Control-Request-Method: GET
     */
    public const ACCESS_CONTROL_REQUEST_METHOD = 'Access-Control-Request-Method';

    /**
     * Requests can be performed across origins while sharing the origin.
     *
     * @example - Access-Control-Request-Headers: authorization, content-type
     */
    public const ACCESS_CONTROL_REQUEST_HEADERS = 'Access-Control-Request-Headers';

    /**
     * Credentials used for HTTP authentication.
     *
     * @example - Authorization: Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==
     */
    public const AUTHORIZATION = 'Authorization';

    /**
     * All caching mechanisms along the request-response chain must follow these directives.
     *
     * @example - Cache-Control: no-cache
     */
    public const CACHE_CONTROL = 'Cache-Control';

    /**
     * Options for controlling the current connection, including
     * the hop-by-hop request fields. Must not be used with HTTP/2.
     *
     * @example - Connection: keep-aliveConnection: Upgrade
     */
    public const CONNECTION = 'Connection';

    /**
     * The type of encoding used on the data.
     *
     * @example - Content-Encoding: gzip
     */
    public const CONTENT_ENCODING = 'Content-Encoding';

    /**
     * There are eight bits in each octet of the body of the request.
     *
     * @example - Content-Length: 348
     */
    public const CONTENT_LENGTH = 'Content-Length';

    /**
     * Contains a Base64-encoded binary MD5 sum of the request body.
     *
     * @example - Content-MD5: Q2hlY2sgSW50ZWdyaXR5IQ==
     */
    public const CONTENT_MD5 = 'Content-MD5';

    /**
     * POST and PUT requests use this type of body.
     *
     * @example - Content-Type: application/x-www-form-urlencoded
     */
    public const CONTENT_TYPE = 'Content-Type';

    /**
     * The server previously sent an HTTP cookie with Set-Cookie.
     *
     * @example - Cookie: $Version=1; Skin=new;
     */
    public const COOKIE = 'Cookie';

    /**
     * In “HTTP-date” format according to RFC 7231 Date/Time Formats,
     * this is the date and time at which the message was originated.
     *
     * @example - Date: Tue, 15 Nov 1994 08:12:31 GMT
     */
    public const DATE = 'Date';

    /**
     * Clients require particular server behaviors in this case.
     *
     * @example - Expect: 100-continue
     */
    public const EXPECT = 'Expect';

    /**
     * Provide original information about a client connecting
     * to a web server through an HTTP proxy.
     *
     * @example - Forwarded: for=192.0.2.60;proto=http;by=203.0.113.43
     */
    public const FORWARDED = 'Forwarded';

    /**
     * The email address of the person making the request.
     *
     * @example - From: user@example.com
     */
    public const FROM = 'From';

    /**
     * For virtual hosting, the domain name and TCP port number
     * of the server are to be used. If the requested service is
     * provided over the standard port, the port number may be omitted.
     *
     * @example - Host: en.wikipedia.org:8080
     */
    public const HOST = 'Host';

    /**
     * Upgraded requests from HTTP/1.1 to HTTP/2 MUST include exactly
     * one HTTP2-Setting header field. An HTTP2-Settings header field
     * contains parameters governing the HTTP/2 connection. It is included
     * in anticipation of the upgrade request being accepted by the server.
     *
     * @example - HTTP2-Settings: token64
     */
    public const HTTP2_SETTINGS = 'HTTP2-Settings';

    /**
     * Only execute the action if the client-supplied entity matches
     * the server-supplied entity. It’s primarily used by methods like
     * PUT to only update resources if they haven’t been modified since
     * the last update.
     *
     * @example - If-Match: “734062cd8c284d8af7ad3082f2w9582d”
     */
    public const IF_MATCH = 'If-Match';

    /**
     * Provides a 304 Not Modified response if the content has not changed.
     *
     * @example - If-Modified-Since: Sun, 24 Oct 1294 13:41:32 GMT
     */
    public const IF_MODIFIED_SINCE = 'If-Modified-Since';

    /**
     * If the content has not been modified, it will return
     * a 304 Not Modified response code.
     *
     * @example - If-None-Match: “737060cd8c284d8af7ad3082f209582d”
     */
    public const IF_NONE_MATCH = 'If-None-Match';

    /**
     * Send me the missing part(s) of the entity, or send me
     * the entire new entity if it’s unchanged.
     *
     * @example - If-Range: “737060cd8c284d8af7ad3082f209582d”
     */
    public const IF_RANGE = 'If-Range';

    /**
     * Send the response only if the entity hasn’t been modified
     * since a certain time.
     *
     * @example - If-Unmodified-Since: Sat, 29 Oct 1994 19:43:31 GMT
     */
    public const IF_UNMODIFIED_SINCE = 'If-Unmodified-Since';

    /**
     * The message can only be forwarded through proxy servers or
     * gateways a certain number of times.
     *
     * @example - Max-Forwards: 10
     */
    public const MAX_FORWARDS = 'Max-Forwards';

    /**
     * Sends a request for cross-origin resource sharing
     * (asks the server for Access-Control-* response fields).
     *
     * @example - Origin: http://www.example-social-network.com
     */
    public const ORIGIN = 'Origin';

    /**
     * Fields that are specific to an implementation and may have
     * effects anywhere along the request-response chain.
     *
     * @example - Pragma: no-cache
     */
    public const PRAGMA = 'Pragma';

    /**
     * Allows the client to request the server to employ certain
     * behaviors during the processing of a request.
     *
     * @example - Prefer: return=representation
     */
    public const PREFER = 'Prefer';

    /**
     * Connecting to a proxy requires authorization credentials.
     *
     * @example - Proxy-Authorization: Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==
     */
    public const PROXY_AUTHORIZATION = 'Proxy-Authorization';

    /**
     * Partially request an entity. Bytes start at 0.
     *
     * @example - Range: bytes=500-999
     */
    public const RANGE = 'Range';

    /**
     * Links to the currently requested page were followed from
     * the previous web page. It has become standard usage to spell
     * “referrer” correctly, as well as incorrectly spelled in
     * virtually all implementations.
     *
     * @example - Referer: http://en.wikipedia.org/wiki/Main_Page
     */
    public const REFERER = 'Referer';

    /**
     * The encoding the user agent is willing to accept: the same
     * values as for the response header field Transfer-Encoding,
     * plus the “trailers” value (related to chunked transfers)
     * indicating it expects to receive further fields in the trailer
     * after the last chunk.
     *
     * @example - TE: trailers, deflate
     */
    public const TE = 'TE';

    /**
     * A trailer with chunked transfer coding contains the specified
     * set of header fields. This value indicates that the trailer
     * contains the given set of header fields.
     *
     * @example - Trailer: Max-Forwards
     */
    public const TRAILER = 'Trailer';

    /**
     * By encoding, the entity can be sent safely to the user.
     * Methods currently defined are chunked, compress, deflate,
     * gzip, and identity. Cannot be used with HTTP/2.
     *
     * @example - Transfer-Encoding: chunked
     */
    public const TRANSFER_ENCODING = 'Transfer-Encoding';

    /**
     * The user agent string of the user agent (client).
     *
     * @example - User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:12.0) Gecko/20100101 Firefox/12.0
     */
    public const USER_AGENT = 'User-Agent';

    /**
     * Upgrade the server to another protocol.
     * Not compatible with HTTP/2.
     *
     * @example - Upgrade: h2c, HTTPS/1.3, IRC/6.9, RTA/x11, websocket
     */
    public const UPGRADE = 'Upgrade';

    /**
     * Provides the server with information about the proxy
     * through which the request was sent.
     *
     * @example - Via: 1.0 fred, 1.1 example.com (Apache/1.1)
     */
    public const VIA = 'Via';

    /**
     * The entity-body may have problems.
     *
     * @example - Warning: 199 Miscellaneous warning
     */
    public const WARNING = 'Warning';

    /**
     * An HTTP -> HTTPS server (possibly in the middle of migration) is informed
     * that the client prefers a redirect to HTTPS and is able to handle
     * Content-Security-Policy: upgrade-insecure-requests cannot be used with HTTP/2.
     *
     * @example - Upgrade-Insecure-Requests: 1
     */
    public const UPGRADE_INSECURE_REQUESTS = 'Upgrade-Insecure-Requests';

    /**
     * Identifies Ajax requests (most JavaScript frameworks send the value XMLHttpRequest);
     * also identifies Android apps that use the WebView.
     *
     * @example - X-Requested-With: XMLHttpRequest
     */
    public const X_REQUESTED_WITH = 'X-Requested-With';

    /**
     * Disables the tracking of a user in a web application. (since Firefox 4.0 Beta 11)
     * This is Mozilla’s version of the X-Do-Not-Track header field. It is also supported
     * by Safari and Internet Explorer 9. An IETF draft proposal was submitted on March 7, 2011.
     * A specification is being written by the W3C Tracking Protection Working Group.
     *
     * @example - DNT: 1 (Do Not Track Enabled)DNT: 0 (Do Not Track Disabled)
     */
    public const DNT = 'DNT';

    /**
     * The de-facto standard for identifying the originating IP address of a client
     * connecting to a web server through an HTTP proxy or load balancer.
     * Replaced by Forwarded header.
     *
     * @example - X-Forwarded-For: client1, proxy1, proxy2X-Forwarded-For: 129.78.138.66, 129.78.64.103
     */
    public const X_FORWARDED_FOR = 'X-Forwarded-For';

    /**
     * The de-facto standard for identifying the original host requested by the client
     * in the Host HTTP request header, since the reverse proxy (load balancer)
     * may differ from the original server handling the request.
     * Replaced by the Forwarded header.
     *
     * @example - X-Forwarded-Host: en.wikipedia.org:8080X-Forwarded-Host: en.wikipedia.org
     */
    public const X_FORWARDED_HOST = 'X-Forwarded-Host';

    /**
     * An HTTP request’s originating protocol can easily be determined by a reverse proxy
     * (or a load balancer) by communicating with the webserver via HTTP even if the web
     * server’s response is HTTPS. Google clients communicating with Google servers use
     * a different header (X-ProxyUser-Ip). This is no longer used.
     *
     * @example - X-Forwarded-Proto: https
     */
    public const X_FORWARDED_PROTO = 'X-Forwarded-Proto';

    /**
     * Microsoft applications and load balancers use this non-standard header field.
     *
     * @example - Front-End-Https: on
     */
    public const FRONT_END_HTTPS = 'Front-End-Https';

    /**
     * A request that overrides the method specified in the request (typically POST)
     * with the method specified in the header field (typically PUT or DELETE).
     * Sometimes, user agents and firewalls prevent PUT or DELETE methods from being
     * sent directly (note that this is either the result of a software issue, which
     * should be fixed or an intentional configuration, in which public const bypassing it may
     * be the right thing to do).
     *
     * @example - X-HTTP-Method-Override: DELETE
     */
    public const X_HTTP_METHOD_OVERRIDE = 'X-Http-Method-Override';

    /**
     * Easy parsing of the MakeModel/Firmware that is usually found in AT&T
     * devices’ User-Agent strings.
     *
     * @example - X-Att-Deviceid: GT-P7320/P7320XXLPG
     */
    public const X_ATT_DEVICEID = 'X-ATT-DeviceId';

    /**
     * Provides a link to an XML file on the Internet containing a full description
     * and details about the device currently connected. An example of an XML file
     * for an AT&T Samsung Galaxy S2 can be found to the right.
     *
     * @example - x-wap-profile: http://wap.example.com/uaprof/SGH-I777.xml
     */
    public const X_WAP_PROFILE = 'X-Wap-Profile';

    /**
     * A misunderstanding of the HTTP specifications led to this implementation.
     * It was common in early implementations of HTTP. Identical to the
     * standard Connection field. Not compatible with HTTP/2.
     *
     * @example - Proxy-Connection: keep-alive
     */
    public const PROXY_CONNECTION = 'Proxy-Connection';

    /**
     * A unique ID inserted into a server-side packet to identify
     * Verizon Wireless customers; also known as a “permacookie” or “supercookie”.
     *
     * @example - X-UIDH: …
     */
    public const X_UIDH = 'X-UIDH';

    /**
     * This prevents cross-site request forgery.
     * X-CSRFToken and X-XSRF-TOKEN are alternative header names.
     *
     * @example - X-Csrf-Token: i8XNjC4b8KVok4uw5RftR38Wgp2BFwql
     */
    public const X_CSRF_TOKEN = 'X-Csrf-Token';

    /**
     * Coordinates HTTP requests between a client and a server.
     *
     * @example - X-Request-ID: f058ebd6-02f7-4d3f-942e-904344e8cde5
     */
    public const X_REQUEST_ID = 'X-Request-ID';

    /**
     * Track and correlate related requests across different systems
     * or components within a distributed architecture.
     *
     * @example - X-Correlation-ID: 1234567890abcdef
     */
    public const X_CORRELATION_ID = 'X-Correlation-ID';

    /**
     * Developers can deliver lighter, faster applications to users
     * by using the Save-Data client hint request header available
     * in Chrome, Opera, and Yandex browsers.
     *
     * @example - Save-Data: on
     */
    public const SAVE_DATA = 'Save-Data';

    /**
     * Requests HTTP Client Hints.
     *
     * @example - Accept-CH: UA, Platform
     */
    public const ACCEPT_CH = 'Accept-CH';

    /**
     * Specifying which websites are eligible to participate
     * in cross-origin resource sharing.
     *
     * @example - Access-Control-Allow-Origin: *
     */
    public const ACCESS_CONTROL_ALLOW_ORIGIN = 'Access-Control-Allow-Origin';

    /**
     * @example -
     */
    public const ACCESS_CONTROL_ALLOW_HEADERS = 'Access-Control-Allow-Headers';

    /**
     * @example -
     */
    public const ACCESS_CONTROL_ALLOW_CREDENTIALS = 'Access-Control-Allow-Credentials';

    /**
     * @example -
     */
    public const ACCESS_CONTROL_ALLOW_METHODS = 'Access-Control-Allow-Methods';

    /**
     * @example -
     */
    public const ACCESS_CONTROL_EXPOSE_HEADERS = 'Access-Control-Expose-Headers';

    /**
     * @example -
     */
    public const ACCESS_CONTROL_MAX_AGE = 'Access-Control-Max-Age';

    /**
     * Provides information about the patch document formats
     * supported by this server.
     *
     * @example - Accept-Patch: text/example;charset=utf-8
     */
    public const ACCEPT_PATCH = 'Accept-Patch';

    /**
     * What types of partial content ranges this server supports.
     *
     * @example - Accept-Ranges: bytes
     */
    public const ACCEPT_RANGES = 'Accept-Ranges';

    /**
     * The time the object has been in a proxy cache in seconds.
     *
     * @example - Age: 12
     */
    public const AGE = 'Age';

    /**
     * Methods that are valid for a given resource.
     * To be used for an error 405.
     *
     * @example - Allow: GET, HEAD
     */
    public const ALLOW = 'Allow';

    /**
     * Using the “Alt-Svc” header (meaning Alternative Services),
     * a server can indicate that its resources are also available
     * over a different network location (host or port). When using HTTP/2,
     * servers should instead send an ALTSVC frame.
     *
     * @example - Alt-Svc: http/1.1=”http2.example.com:8001″; ma=7200
     */
    public const ALT_SVC = 'Alt-Svc';

    /**
     * Providing a “File Download” dialogue box for a known MIME type
     * with binary format or suggesting a filename for dynamic content.
     * Special characters require quotes.
     *
     * @example - Content-Disposition: attachment; filename=”fname.ext”
     */
    public const CONTENT_DISPOSITION = 'Content-Disposition';

    /**
     * Natural language or languages of the intended audience for the
     * enclosed content.
     *
     * @example - Content-Language: da
     */
    public const CONTENT_LANGUAGE = 'Content-Language';

    /**
     * A different location where the data will be returned.
     *
     * @example - Content-Location: /index.htm
     */
    public const CONTENT_LOCATION = 'Content-Location';

    /**
     * This partial message belongs in a full body massage.
     *
     * @example - Content-Range: bytes 21010-47021/47022
     */
    public const CONTENT_RANGE = 'Content-Range';

    /**
     * This entity-tag specifies the delta-encoding of the response.
     *
     * @example - Delta-Base: “abc”
     */
    public const DELTA_BASE = 'Delta-Base';

    /**
     * Version identifier, often a message digest, for a specific resource.
     *
     * @example - ETag: “737060cd8c284d8af7ad3082f209582d”
     */
    public const ETAG = 'ETag';

    /**
     * Specifies the date/time following which a response is considered
     * stale (in HTML-date format as defined by RFC 7231).
     *
     * @example - Expires: Thu, 01 Dec 1994 16:00:00 GMT
     */
    public const EXPIRES = 'Expires';

    /**
     * Responses are subjected to instance manipulations.
     *
     * @example - IM: feed
     */
    public const IM = 'IM';

    /**
     * The last modified date (in “HTTP-date” format, as defined in RFC 7231)
     * for the requested object.
     *
     * @example - Last-Modified: Tue, 15 Nov 1994 12:45:26 GMT
     */
    public const LAST_MODIFIED = 'Last-Modified';

    /**
     * A typed relationship between two resources, where the relation type
     * is defined by RFC 5988.
     *
     * @example - Link: </feed>; rel=”alternate”
     */
    public const LINK = 'Link';

    /**
     * When redirecting or creating a new resource, this parameter is used.
     *
     * @example - Example 1: Location: http://www.w3.org/pub/WWW/People.htmlExample
     */
    public const LOCATION = 'Location';

    /**
     * P3P:CP=”your_compact_policy” is supposed to be the P3P policy.
     * While most browsers have not fully implemented P3P, a lot of websites
     * set this field with fake policy text, enough to convince browsers
     * of the existence of the P3P policy and grant permission for third-party cookies.
     *
     * @example - P3P: CP=”This is not a P3P policy! See https://en.wikipedia.org/wiki/Special:CentralAutoLogin/P3P for more info.”
     */
    public const P3P = 'P3P';

    /**
     * This value indicates which Prefer tokens were honored by the server
     * and used in the processing of the request.
     *
     * @example - Preference-Applied: return=representation
     */
    public const PREFERENCE_APPLIED = 'Preference-Applied';

    /**
     * For access to the proxy, you must request authentication.
     *
     * @example - Proxy-Authenticate: Basic
     */
    public const PROXY_AUTHENTICATE = 'Proxy-Authenticate';

    /**
     * An authentic TLS certificate’s hash is announced
     * by HTTP Public Key Pinning.
     *
     * @example - Public-Key-Pins: max-age=2592000; pin-sha256=”E9CZ9INDbd+2eRQozYqqbQ2yXLVKB9+xcprMF+44U1g=”;
     */
    public const PUBLIC_KEY_PINS = 'Public-Key-Pins';

    /**
     * The client is instructed to try again later if an entity is temporarily
     * unavailable. A specified period of time (in seconds) or an HTTP date
     * could be used as the value.
     *
     * @example - Retry-After: 122, Retry-After: Fri, 02 Nov 2016 13:59:59 GMT
     */
    public const RETRY_AFTER = 'Retry-After';

    /**
     * Name of the webserver.
     *
     * @example - Server: Apache/2.4.1 (Unix)
     */
    public const SERVER = 'Server';

    /**
     * Specify a cookie for the web server.
     *
     * @example - Set-Cookie: UserID=KTG; Max-Age=3100; Version=1
     */
    public const SET_COOKIE = 'Set-Cookie';

    /**
     * HSTS Policies tell HTTP clients how long to cache HTTPS only policies
     * and whether they apply to subdomains.
     *
     * @example - Strict-Transport-Security: max-age=16320300; includeSubDomains
     */
    public const STRICT_TRANSPORT_SECURITY = 'Strict-Transport-Security';

    /**
     * “!” – under construction “?” – dynamic “T” – tracking with consent
     * “C” – tracking if consented to “P” – tracking only with consent
     * “D” – disregarding DNT “U” – updated “N” – not tracking.
     *
     * @example - Tk: ?
     */
    public const TK = 'Tk';

    /**
     * Provides instructions to downstream proxies on how to match future
     * request headers to determine whether a cached response can be used
     * instead of requesting a fresh one from the origin server.
     *
     * @example - Example 1: Vary: *Example 2: Vary: Accept-Language
     */
    public const VARY = 'Vary';

    /**
     * Establishes the authentication scheme that should be used
     * to access the requested entity.
     *
     * @example - WWW-Authenticate: Basic
     */
    public const WWW_AUTHENTICATE = 'WWW-Authenticate';

    /**
     * Clickjacking protection: deny – no rendering within a frame,
     * same-origin – no rendering if origin mismatches,
     * allow-from – allow from a specified location, allow all – non-standard,
     * allow from any location.
     *
     * @example - X-Frame-Options: deny
     */
    public const X_FRAME_OPTIONS = 'X-Frame-Options';

    /**
     * Provides protection against the CORS and Man-in-the-middle attacks.
     * CSP can be used for specifying which resource will be loaded from where.
     *
     * @example -
     */
    public const CONTENT_SECURITY_POLICY = 'Content-Security-Policy';

    /**
     * A specific CSP HTTP Header for a single web page.
     *
     * @example -
     */
    public const X_CONTENT_SECURITY_POLICY = 'X-Content-Security-Policy';

    /**
     * Definition of the CSP.
     *
     * @example - X-WebKit-CSP: default-src ‘self’
     */
    public const X_WEBKIT_CSP = 'X-WebKit-CSP';

    /**
     * Force for Certificate Transparency.
     *
     * @example - Expect-CT: max-age=604800, enforce, report-uri=”https://example.example/report”
     */
    public const EXPECT_CT = 'Expect-CT';

    /**
     * Logging of network requests is configured here.
     *
     * @example - NEL: { “report_to”: “name_of_reporting_group”,
     * “max_age”: 12345, “include_subdomains”: false, “success_fraction”: 0.0,
     * “failure_fraction”: 1.0 }
     */
    public const NEL = 'NEL';

    /**
     * To enable or disable different browser features or APIs.
     *
     * @example - Permissions-Policy: fullscreen=(), camera=(), microphone=(), geolocation=(), interest-cohort=()
     */
    public const PERMISSIONS_POLICY = 'Permissions-Policy';

    /**
     * Redirects to another resource or creates a new resource.
     * After 5 seconds, this refresh redirects. Netscape header extension
     * is supported by most web browsers. Part of HTML standard.
     *
     * @example - Refresh: 5; url=http://www.w3.org/pub/WWW/People.html
     */
    public const REFRESH = 'Refresh';

    /**
     * An origin’s reporting endpoints are stored by the user agent.
     *
     * @example - Report-To: { “group”: “csp-endpoint”, “max_age”: 10886400, “endpoints”: [ { “url”: “https-url-of-site-which-collects-reports” } ] }
     */
    public const REPORT_TO = 'Report-To';

    /**
     * The HTTP response status is specified in the CGI header.
     * In RFC 7230, “Status-Line” is defined as a separate element in an HTTP response.
     *
     * @example - Status: 200 OK
     */
    public const STATUS = 'Status';

    /**
     * In Timing-Allow-Origin response headers, origins are permitted to see the values
     * of attributes retrieved by the Resource Timing API that would otherwise be zero due
     * to cross-origin restrictions.
     *
     * @example - Timing-Allow-Origin: *
     */
    public const TIMING_ALLOW_ORIGIN = 'Timing-Allow-Origin';

    /**
     * Only supported by Gecko browsers; provide the duration of the audio
     * or video in seconds.
     *
     * @example - X-Content-Duration: 42.666
     */
    public const X_CONTENT_DURATION = 'X-Content-Duration';

    /**
     * IE cannot MIME-sniff a response that is not declared as a content type
     * if its only defined value is “nosniff”. Likewise, Google Chrome cannot
     * MIME-sniff an extension that is not declared as a content type.
     *
     * @example - X-Content-Type-Options: nosni
     */
    public const X_CONTENT_TYPE_OPTIONS = 'X-Content-Type-Options';

    /**
     * (X-Runtime, X-Version, or X-AspNet-Version) identifies the technology
     * (e.g. ASP.NET, PHP, JBoss) supporting the web application.
     *
     * @example - X-Powered-By: PHP/5.4.0
     */
    public const X_POWERED_BY = 'X-Powered-By';

    /**
     * Provides the component responsible for a particular redirect.
     *
     * @example - X-Redirect-By: WordPress
     */
    public const X_REDIRECT_BY = 'X-Redirect-By';

    /**
     * Recommends which rendering engine should be used to display the content
     * (often a backward-compatibility option). This also allows internet explorer
     * to use Chrome Frame. IE=edge is the only value defined in HTML Standard.
     *
     * @example - X-UA-Compatible: IE=edge
     */
    public const X_UA_COMPATIBLE = 'X-UA-Compatible';

    /**
     * XSS (cross-site scripting) filter.
     *
     * @example - X-XSS-Protection: 1; mode=block
     */
    public const X_XSS_PROTECTION = 'X-XSS-Protection';
}
