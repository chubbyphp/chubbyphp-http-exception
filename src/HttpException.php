<?php

declare(strict_types=1);

namespace Chubbyphp\HttpException;

final class HttpException extends \RuntimeException implements HttpExceptionInterface
{
    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public function __construct(
        private readonly string $type,
        private readonly int $status,
        private readonly string $title,
        private readonly array $data = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct($title, $status, $previous);
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createBadRequest(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.1',
            400,
            'Bad Request',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createUnauthorized(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.2',
            401,
            'Unauthorized',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createPaymentRequired(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.3',
            402,
            'Payment Required',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createForbidden(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.4',
            403,
            'Forbidden',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createNotFound(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.5',
            404,
            'Not Found',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createMethodNotAllowed(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.6',
            405,
            'Method Not Allowed',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createNotAcceptable(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.7',
            406,
            'Not Acceptable',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createProxyAuthenticationRequired(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.8',
            407,
            'Proxy Authentication Required',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createRequestTimeout(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.9',
            408,
            'Request Timeout',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createConflict(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.10',
            409,
            'Conflict',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createGone(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.11',
            410,
            'Gone',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createLengthRequired(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.12',
            411,
            'Length Required',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createPreconditionFailed(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.13',
            412,
            'Precondition Failed',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createRequestEntityTooLarge(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.14',
            413,
            'Request Entity Too Large',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createRequestURITooLong(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.15',
            414,
            'Request-URI Too Long',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createUnsupportedMediaType(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.16',
            415,
            'Unsupported Media Type',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createRangeNotSatisfiable(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.17',
            416,
            'Range Not Satisfiable',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createExpectationFailed(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.18',
            417,
            'Expectation Failed',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createImateapot(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2324#section-2.3.2',
            418,
            'I\'m a teapot',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createMisdirectedRequest(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc7540#section-9.1.2',
            421,
            'Misdirected Request',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createUnprocessableEntity(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc4918#section-11.2',
            422,
            'Unprocessable Entity',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createLocked(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc4918#section-11.3',
            423,
            'Locked',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createFailedDependency(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc4918#section-11.4',
            424,
            'Failed Dependency',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createTooEarly(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc8470#section-5.2',
            425,
            'Too Early',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createUpgradeRequired(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc7231#section-6.5.15',
            426,
            'Upgrade Required',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createPreconditionRequired(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc6585#section-3',
            428,
            'Precondition Required',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createTooManyRequests(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc6585#section-4',
            429,
            'Too Many Requests',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createRequestHeaderFieldsTooLarge(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc6585#section-7.3',
            431,
            'Request Header Fields Too Large',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createUnavailableForLegalReasons(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc7725#section-3',
            451,
            'Unavailable For Legal Reasons',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createInternalServerError(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.1',
            500,
            'Internal Server Error',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createNotImplemented(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.2',
            501,
            'Not Implemented',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createBadGateway(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.3',
            502,
            'Bad Gateway',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createServiceUnavailable(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.4',
            503,
            'Service Unavailable',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createGatewayTimeout(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.5',
            504,
            'Gateway Timeout',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createHTTPVersionNotSupported(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.6',
            505,
            'HTTP Version Not Supported',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createVariantAlsoNegotiates(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2295#section-8.1',
            506,
            'Variant Also Negotiates',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createInsufficientStorage(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc4918#section-11.5',
            507,
            'Insufficient Storage',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createLoopDetected(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc5842#section-7.2',
            508,
            'Loop Detected',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createNotExtended(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc2774#section-7',
            510,
            'Not Extended',
            $data,
            $previous,
        );
    }

    /**
     * @param array{detail?: null|string, instance?: null|string, ...} $data
     */
    public static function createNetworkAuthenticationRequired(array $data = [], ?\Throwable $previous = null): self
    {
        return new self(
            'https://datatracker.ietf.org/doc/html/rfc6585#section-6',
            511,
            'Network Authentication Required',
            $data,
            $previous,
        );
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return array{type: string, status: int, title: string, detail: null|string, instance: null|string, ...}
     */
    public function jsonSerialize(): array
    {
        /** @var array{type: string, status: int, title: string, detail: null|string, instance: null|string, ...} */
        return [
            'type' => $this->type,
            'status' => $this->status,
            'title' => $this->title,
            'detail' => null,
            'instance' => null,
            ...$this->data,
        ];
    }
}
