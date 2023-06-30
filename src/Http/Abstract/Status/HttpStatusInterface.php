<?php declare(strict_types=1);

/*
 * This file is part of the Webutils package.
 *
 * (c) Kristian Koribsky <kristian.koribsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Web\Utils\Http\Abstract\Status;

/**
 * The HTTP status code of a response is a three-digit integer code that
 * describes the result of the request and the semantics of the response,
 * including whether the request was successful and what content is enclosed.
 *
 * All valid status codes are within the range of 100 to 599, inclusive.
 *
 * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-status-codes
 */
interface HttpStatusInterface
{
    // 1xx (Informational): The request was received, continuing process
    // ================================================================================
    // The 1xx (Informational) class of status code indicates an interim response for
    // communicating connection status or request progress prior to completing the
    // requested action and sending a final response. Since HTTP/1.0 did not define
    // any 1xx status codes, a server MUST NOT send a 1xx response to an HTTP/1.0 client.
    // A 1xx response is terminated by the end of the header section; it cannot contain
    // content or trailers.
    // ================================================================================

    /**
     * The 100 (Continue) status code indicates that the initial part of a request
     * has been received and has not yet been rejected by the server. The server
     * intends to send a final response after the request has been fully
     * received and acted upon.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-100-continue
     */
    public const HTTP_CONTINUE = 100;

    // TODO @see upgrade header field
    /**
     * The 101 (Switching Protocols) status code indicates that the server understands
     * and is willing to comply with the client's request, via the Upgrade header field,
     * for a change in the application protocol being used on this connection.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-101-switching-protocols
     */
    public const HTTP_SWITCHING_PROTOCOLS = 101;

    /**
     * The 102 (Processing) status code is an interim response used to inform
     * the client that the server has accepted the complete request, but has
     * not yet completed it.
     *
     * @see https://datatracker.ietf.org/doc/html/rfc2518#section-10.1
     */
    public const HTTP_PROCESSING = 102;

    /**
     * The 103 (Early Hints) informational status code indicates to the
     * client that the server is likely to send a final response with the
     * header fields included in the informational response.
     *
     * @see https://datatracker.ietf.org/doc/html/rfc8297#section-2
     */
    public const HTTP_EARLY_HINTS = 103;

    // 2xx (SUCCESSFUL): The request was successfully received, understood, and accepted
    // ================================================================================
    // The 2xx (Successful) class of status code indicates that the client's request was
    // successfully received, understood, and accepted.
    // ================================================================================

    /**
     * The 200 (OK) status indicates that the request has succeeded.
     * The content sent in a 200 response depends on the request method.
     *
     * @see \Web\Utils\Http\Abstract\Method\HttpMethodInterface
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-200-ok
     */
    public const HTTP_OK = 200;

    // TODO finish @see reference for Location Header
    /**
     * The 201 (Created) status code indicates that the request has been
     * fulfilled and has resulted in one or more new resources being created.
     * The primary resource created by the request is identified by either
     * a Location header field in the response or, if no Location header field
     * is received, by the target URI.
     *
     * @see
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-201-created
     */
    public const HTTP_CREATED = 201;

    /**
     * The 202 (Accepted) status code indicates that the request has been accepted
     * for processing, but the processing has not been completed. The request might
     * or might not eventually be acted upon, as it might be disallowed when
     * processing actually takes place.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-202-accepted
     */
    public const HTTP_ACCEPTED = 202;

    /**
     * The 203 (Non-Authoritative Information) status code indicates that the
     * request was successful but the enclosed content has been modified from
     * that of the origin server's 200 (OK) response by a transforming proxy.
     *
     * @see self::HTTP_OK
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-203-non-authoritative-infor
     */
    public const HTTP_NON_AUTHORITATIVE_INFORMATION = 203;

    /**
     * The 204 (No Content) status code indicates that the server has successfully
     * fulfilled the request and that there is no additional content to send in the
     * response content. Metadata in the response header fields refer to the target
     * resource and its selected representation after the requested action was applied.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-204-no-content
     */
    public const HTTP_NO_CONTENT = 204;

    /**
     * The 205 (Reset Content) status code indicates that the server has fulfilled
     * the request and desires that the user agent reset the "document view",
     * which caused the request to be sent, to its original state as received
     * from the origin server.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-205-reset-content
     */
    public const HTTP_RESET_CONTENT = 205;

    /**
     * The 206 (Partial Content) status code indicates that the server
     * is successfully fulfilling a range request for the target resource
     * by transferring one or more parts of the selected representation.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-206-partial-content
     */
    public const HTTP_PARTIAL_CONTENT = 206;

    /**
     * A Multi-Status response conveys information about multiple resources
     * in situations where multiple status codes might be appropriate.
     * The default Multi-Status response body is a text/xml or
     * application/xml HTTP entity with a 'multistatus' root element.
     *
     * @see \Web\Utils\Http\Abstract\Data\MediaTypeInterface::APPLICATION_XML
     * @see https://www.rfc-editor.org/rfc/rfc4918#section-13
     */
    public const HTTP_MULTI_STATUS = 207;

    /**
     * The 208 (Already Reported) status code can be used inside a DAV:
     * propstat response element to avoid enumerating the internal members
     * of multiple bindings to the same collection repeatedly.
     *
     * @see https://www.rfc-editor.org/rfc/rfc5842.html#section-7.1
     */
    public const HTTP_ALREADY_REPORTED = 208;

    /**
     * The server has fulfilled a GET request for the resource, and the
     * response is a representation of the result of one or more
     * instance-manipulations applied to the current instance.
     *
     * @see https://www.rfc-editor.org/rfc/rfc3229.html#section-10.4.1
     */
    public const HTTP_IM_USED = 226;

    // 3xx (Redirection): Further action needs to be taken in order to complete the request
    // ================================================================================
    // The 3xx (Redirection) class of status code indicates that further action needs
    // to be taken by the user agent in order to fulfill the request.
    // ================================================================================

    /**
     * The 300 (Multiple Choices) status code indicates that the target resource has
     * more than one representation, each with its own more specific identifier,
     * and information about the alternatives is being provided so that the user
     * can select a preferred representation by redirecting its request to one
     * or more of those identifiers.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-300-multiple-choices
     */
    public const HTTP_MULTIPLE_CHOICES = 300;

    /**
     * The 301 (Moved Permanently) status code indicates that the target resource
     * has been assigned a new permanent URIand any future references to this
     * resource ought to use one of the enclosed URIs.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-301-moved-permanently
     */
    public const HTTP_MOVED_PERMANENTLY = 301;

    /**
     * The 302 (Found) status code indicates that the target resource resides
     * temporarily under a different URI. Since the redirection might be
     * altered on occasion, the client ought to continue to use the target
     * URI for future requests.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-302-found
     */
    public const HTTP_FOUND = 302;

    /**
     * The 303 (See Other) status code indicates that the server is redirecting
     * the user agent to a different resource, as indicated by a URI in the
     * Location header field, which is intended to provide an indirect response
     * to the original request.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-303-see-other
     */
    public const HTTP_SEE_OTHER = 303;

    /**
     * The 304 (Not Modified) status code indicates that a conditional GET or HEAD
     * request has been received and would have resulted in a 200 (OK) response
     * if it were not for the fact that the condition evaluated to false.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-304-not-modified
     */
    public const HTTP_NOT_MODIFIED = 304;

    /**
     * The 305 (Use Proxy) status code was defined in a previous version
     * of RFC 9110 HTTP specification and is now deprecated.
     *
     * @deprecated
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-305-use-proxy
     */
    public const HTTP_USE_PROXY = 305;

    /**
     * This response code is no longer used; it is just reserved.
     * It was used in a previous version of the RFC 9110 HTTP specification.
     *
     * @deprecated
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-306-unused
     */
    public const HTTP_SWITCH_PROXY = 306;

    /**
     * The 307 (Temporary Redirect) status code indicates that the target
     * resource resides temporarily under a different URI and the user agent
     * MUST NOT change the request method if it performs an automatic
     * redirection to that URI.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-307-temporary-redirect
     */
    public const HTTP_TEMPORARY_REDIRECT = 307;

    /**
     * The 308 (Permanent Redirect) status code indicates that the target
     * resource has been assigned a new permanent URI and any future references
     * to this resource ought to use one of the enclosed URIs. The server is
     * suggesting that a user agent with link-editing capability can permanently
     * replace references to the target URI with one of the new references
     * sent by the server.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-308-permanent-redirect
     */
    public const HTTP_PERMANENT_REDIRECT = 308;

    // 4xx (Client Error): The request contains bad syntax or cannot be fulfilled
    // ================================================================================
    // The 4xx (Client Error) class of status code indicates that the client seems to
    // have erred. Except when responding to a HEAD request, the server SHOULD send a
    // representation containing an explanation of the error situation, and whether it
    // is a temporary or permanent condition. These status codes are applicable to any
    // request method. User agents SHOULD display any included representation to the user.
    // ================================================================================

    /**
     * The 400 (Bad Request) status code indicates that the server cannot or will
     * not process the request due to something that is perceived to be a client
     * error (e.g., malformed request syntax, invalid request message framing,
     * or deceptive request routing).
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-400-bad-request
     */
    public const HTTP_BAD_REQUEST = 400;

    // TODO add WWW-Authenticate header @see
    /**
     * The 401 (Unauthorized) status code indicates that the request has not
     * been applied because it lacks valid authentication credentials for the
     * target resource. The server generating a 401 response MUST send a
     * WWW-Authenticate header field containing at least one challenge
     * applicable to the target resource.
     *
     * @see
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-401-unauthorized
     */
    public const HTTP_UNAUTHORIZED = 401;

    /**
     * This response code is reserved for future use. The initial aim for
     * creating this code was using it for digital payment systems, however
     * this status code is used very rarely and no standard convention exists.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-402-payment-required
     */
    public const HTTP_PAYMENT_REQUIRED = 402;

    /**
     * The 403 (Forbidden) status code indicates that the server understood
     * the request but refuses to fulfill it. A server that wishes to make
     * public why the request has been forbidden can describe that reason
     * in the response content (if any).
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-403-forbidden
     */
    public const HTTP_FORBIDDEN = 403;

    /**
     * The 404 (Not Found) status code indicates that the origin server
     * did not find a current representation for the target resource or
     * is not willing to disclose that one exists. A 404 status code does
     * not indicate whether this lack of representation is temporary or
     * permanent; the 410 (Gone) status code is preferred over 404
     * if the origin server knows, presumably through some configurable
     * means, that the condition is likely to be permanent.
     *
     * @see self::HTTP_GONE
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-404-not-found
     */
    public const HTTP_NOT_FOUND = 404;

    /**
     * The 405 (Method Not Allowed) status code indicates that the method
     * received in the request-line is known by the origin server but not
     * supported by the target resource. The origin server MUST generate
     * an Allow header field in a 405 response containing a list of the
     * target resource's currently supported methods.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-405-method-not-allowed
     */
    public const HTTP_METHOD_NOT_ALLOWED = 405;

    /**
     * The 406 (Not Acceptable) status code indicates that the target resource
     * does not have a current representation that would be acceptable to the
     * user agent, according to the proactive negotiation header fields received
     * in the request, and the server is unwilling to supply a default representation.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-406-not-acceptable
     */
    public const HTTP_NOT_ACCEPTABLE = 406;

    // TODO add @see header
    /**
     * The 407 (Proxy Authentication Required) status code is similar to
     * 401 (Unauthorized), but it indicates that the client needs to
     * authenticate itself in order to use a proxy for this request.
     * The proxy MUST send a Proxy-Authenticate header field containing
     * a challenge applicable to that proxy for the request.
     *
     * @see
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-407-proxy-authentication-re
     */
    public const HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;

    /**
     * The 408 (Request Timeout) status code indicates that the server did not receive
     * a complete request message within the time that it was prepared to wait.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-408-request-timeout
     */
    public const HTTP_REQUEST_TIMEOUT = 408;

    /**
     * The 409 (Conflict) status code indicates that the request could not be
     * completed due to a conflict with the current state of the target resource.
     * This code is used in situations where the user might be able to resolve the
     * conflict and resubmit the request. The server SHOULD generate content that
     * includes enough information for a user to recognize the source of the conflict.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-409-conflict
     */
    public const HTTP_CONFLICT = 409;

    /**
     * The 410 (Gone) status code indicates that access to the target resource
     * is no longer available at the origin server and that this condition is
     * likely to be permanent. If the origin server does not know, or has no
     * facility to determine, whether or not the condition is permanent,
     * the status code 404 (Not Found) ought to be used instead.
     *
     * @see self::HTTP_NOT_FOUND
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-410-gone
     */
    public const HTTP_GONE = 410;

    // TODO add @see header
    /**
     * The 411 (Length Required) status code indicates that the server refuses
     * to accept the request without a defined Content-Length. The client MAY
     * repeat the request if it adds a valid Content-Length header
     * field containing the length of the request content.
     *
     * @see
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-411-length-required
     */
    public const HTTP_LENGTH_REQUIRED = 411;

    /**
     * The 412 (Precondition Failed) status code indicates that one or more conditions
     * given in the request header fields evaluated to false when tested on the server.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-412-precondition-failed
     */
    public const HTTP_PRECONDITION_FAILED = 412;

    /**
     * The 413 (Content Too Large) status code indicates that the server is refusing
     * to process a request because the request content is larger than the server is
     * willing or able to process.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-413-content-too-large
     */
    public const HTTP_PAYLOAD_TOO_LARGE = 413;

    /**
     * The 414 (URI Too Long) status code indicates that the server is refusing
     * to service the request because the target URI is longer than the server
     * is willing to interpret. This rare condition is only likely to occur
     * when a client has improperly converted a POST request to a GET request
     * with long query information, when the client has descended into an infinite
     * loop of redirection or when the server is under attack by a client attempting
     * to exploit potential security holes.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-414-uri-too-long
     */
    public const HTTP_URI_TOO_LONG = 414;

    /**
     * The 415 (Unsupported Media Type) status code indicates that the origin server
     * is refusing to service the request because the content is in a format not
     * supported by this method on the target resource.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-415-unsupported-media-type
     */
    public const HTTP_UNSUPPORTED_MEDIA_TYPE = 415;

    // TODO add @see Range header field
    /**
     * The 416 (Range Not Satisfiable) status code indicates that the set of ranges
     * in the request's Range header field has been rejected either because none
     * of the requested ranges are satisfiable or because the client has requested
     * an excessive number of small or overlapping ranges (a potential DDoS Attack).
     *
     * @see
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-416-range-not-satisfiable
     */
    public const HTTP_RANGE_NOT_SATISFIABLE = 416;

    // TODO add @see Expect header
    /**
     * The 417 (Expectation Failed) status code indicates that the expectation given
     * in the request's Expect header field could not be met by at least one of the
     * inbound servers.
     *
     * @see
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-417-expectation-failed
     */
    public const HTTP_EXPECTATION_FAILED = 417;

    /**
     * RFC2324 was an April 1 RFC that lampooned the various ways HTTP was abused;
     * one such abuse was the definition of an application-specific 418 status code,
     * which has been deployed as a joke often enough for the code to be unusable
     * for any future use.
     *
     * @deprecated
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-418-unused
     * @see https://www.rfc-editor.org/rfc/rfc2324.html#section-2.3.2
     */
    public const HTTP_IM_A_TEAPOT = 418;

    /**
     * The 421 (Misdirected Request) status code indicates that the request was
     * directed at a server that is unable or unwilling to produce an
     * authoritative response for the target URI.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-421-misdirected-request
     */
    public const HTTP_MISDIRECTED_REQUEST = 421;

    /**
     * The 422 (Unprocessable Content) status code indicates that the server
     * understands the content type of the request content, and the syntax of
     * the request content is correct, but it was unable to process the contained
     * instructions.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-422-unprocessable-content
     */
    public const HTTP_UNPROCESSABLE_ENTITY = 422;

    /**
     * The 423 (Locked) status code means the source or destination resource
     * of a method is locked.
     *
     * @see https://www.rfc-editor.org/rfc/rfc4918#section-11.3
     */
    public const HTTP_LOCKED = 423;

    /**
     * The 424 (Failed Dependency) status code means that the method could
     * not be performed on the resource because the requested action
     * depended on another action and that action failed.
     *
     * @see https://www.rfc-editor.org/rfc/rfc4918#section-11.4
     */
    public const HTTP_FAILED_DEPENDENCY = 424;

    /**
     * A 425 (Too Early) status code indicates that the server is unwilling
     * to risk processing a request that might be replayed.
     *
     * @see https://httpwg.org/specs/rfc8470.html#status
     */
    public const HTTP_TOO_EARLY = 425;

    // TODO @see Upgrade header field
    /**
     * The 426 (Upgrade Required) status code indicates that the server refuses
     * to perform the request using the current protocol but might be willing
     * to do so after the client upgrades to a different protocol. The server
     * MUST send an Upgrade header field to indicate the required protocol(s).
     *
     * @see
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-426-upgrade-required
     */
    public const HTTP_UPGRADE_REQUIRED = 426;

    /**
     * The 428 status code indicates that the origin server requires the
     * request to be conditional.
     *
     * @see https://www.rfc-editor.org/rfc/rfc6585#section-3
     */
    public const HTTP_PRECONDITION_REQUIRED = 428;

    // TODO @see Retry-After header
    /**
     * The 429 status code indicates that the user has sent too many requests
     * in a given amount of time. The response representations SHOULD include
     * details explaining the condition, and MAY include a Retry-After header
     * indicating how long to wait before making a new request.
     *
     * @see
     * @see https://www.rfc-editor.org/rfc/rfc6585#section-4
     */
    public const HTTP_TOO_MANY_REQUESTS = 429;

    /**
     * The 431 status code indicates that the server is unwilling to process
     * the request because its header fields are too large.The request MAY be
     * resubmitted after reducing the size of the request header fields.
     *
     * @see https://www.rfc-editor.org/rfc/rfc6585#section-5
     */
    public const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;

    /**
     * This status code indicates that the server is denying access to the
     * resource as a consequence of a legal demand. The server in question
     * might not be an origin server. This type of legal demand typically
     * most directly affects the operations of ISPs and search engines.
     *
     * @see https://httpwg.org/specs/rfc7725.html#n-451-unavailable-for-legal-reasons
     */
    public const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = 451;

    // 5xx (Server Error): The server failed to fulfill an apparently valid request
    // ================================================================================
    // The 5xx (Server Error) class of status code indicates that the server is aware
    // that it has erred or is incapable of performing the requested method. Except when
    // responding to a HEAD request, the server SHOULD send a representation containing
    // an explanation of the error situation, and whether it is a temporary or permanent
    // condition. A user agent SHOULD display any included representation to the user.
    // These status codes are applicable to any request method.
    // ================================================================================

    /**
     * The 500 (Internal Server Error) status code indicates that the server encountered
     * an unexpected condition thatprevented it from fulfilling the request.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-500-internal-server-error
     */
    public const HTTP_INTERNAL_SERVER_ERROR = 500;

    /**
     * The 501 (Not Implemented) status code indicates that the server does not support
     * the functionality required to fulfill the request. This is the appropriate
     * response when the server does not recognize the request method and is not
     * capable of supporting it for any resource.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-501-not-implemented
     */
    public const HTTP_NOT_IMPLEMENTED = 501;

    /**
     * The 502 (Bad Gateway) status code indicates that the server, while acting
     * as a gateway or proxy, received an invalid response from an inbound server
     * it accessed while attempting to fulfill the request.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-502-bad-gateway
     */
    public const HTTP_BAD_GATEWAY = 502;

    // TODO @see Retry-After header field
    /**
     * The 503 (Service Unavailable) status code indicates that the server is
     * currently unable to handle the request due to a temporary overload or
     * scheduled maintenance, which will likely be alleviated after some delay.
     * The server MAY send a Retry-After header field to suggest an appropriate
     * amount of time for the client to wait before retrying the request.
     *
     * @see
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-503-service-unavailable
     */
    public const HTTP_SERVICE_UNAVAILABLE = 503;

    /**
     * The 504 (Gateway Timeout) status code indicates that the server, while acting
     * as a gateway or proxy, did not receive a timely response from an upstream
     * server it needed to access in order to complete the request.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-504-gateway-timeout
     */
    public const HTTP_GATEWAY_TIMEOUT = 504;

    /**
     * The 505 (HTTP Version Not Supported) status code indicates that the server
     * does not support, or refuses to support, the major version of HTTP that was
     * used in the request message.
     *
     * @see https://www.rfc-editor.org/rfc/rfc9110.html#name-505-http-version-not-suppor
     */
    public const HTTP_HTTP_VERSION_NOT_SUPPORTED = 505;

    /**
     * The 506 status code indicates that the server has an internal
     * configuration error: the chosen variant resource is configured to
     * engage in transparent content negotiation itself, and is therefore
     * not a proper end point in the negotiation process.
     *
     * @see https://www.rfc-editor.org/rfc/rfc2295#section-8.1
     */
    public const HTTP_VARIANT_ALSO_NEGOTIATES = 506;

    /**
     * The 507 (Insufficient Storage) status code means the method could not
     * be performed on the resource because the server is unable to store
     * the representation needed to successfully complete the request.
     * This condition is considered to be temporary.  If the request that
     * received this status code was the result of a user action, the
     * request MUST NOT be repeated until it is requested by a separate user
     * action.
     *
     * @see https://www.rfc-editor.org/rfc/rfc4918#section-11.5
     */
    public const HTTP_INSUFFICIENT_STORAGE = 507;

    /**
     * The 508 (Loop Detected) status code indicates that the server
     * terminated an operation because it encountered an infinite loop while
     * processing a request with "Depth: infinity". This status indicates
     * that the entire operation failed.
     *
     * @see https://www.rfc-editor.org/rfc/rfc5842#section-7.2
     */
    public const HTTP_LOOP_DETECTED = 508;

    /**
     * The policy for accessing the resource has not been met in the
     * request.  The server should send back all the information necessary
     * for the client to issue an extended request.
     *
     * @see https://www.rfc-editor.org/rfc/rfc2774#section-7
     */
    public const HTTP_NOT_EXTENDED = 510;

    /**
     * The 511 status code indicates that the client needs to authenticate
     * to gain network access.
     *
     * @see https://www.rfc-editor.org/rfc/rfc6585#section-6
     */
    public const HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;
}
