<?php

declare(strict_types=1);

namespace Chubbyphp\Tests\Framework\Unit;

use Chubbyphp\HttpException\HttpException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Chubbyphp\HttpException\HttpException
 *
 * @internal
 */
final class HttpExceptionTest extends TestCase
{
    public function testConstruct(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = new HttpException('https://domain.tld/path/to/spec', 900, 'Unknown Error', ['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://domain.tld/path/to/spec', $httpException->getType());
        self::assertSame(900, $httpException->getStatus());
        self::assertSame('Unknown Error', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://domain.tld/path/to/spec',
            'status' => 900,
            'title' => 'Unknown Error',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Unknown Error', $httpException->getMessage());
        self::assertSame(900, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testBadRequest(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createBadRequest(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.1', $httpException->getType());
        self::assertSame(400, $httpException->getStatus());
        self::assertSame('Bad Request', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.1',
            'status' => 400,
            'title' => 'Bad Request',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Bad Request', $httpException->getMessage());
        self::assertSame(400, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testUnauthorized(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createUnauthorized(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.2', $httpException->getType());
        self::assertSame(401, $httpException->getStatus());
        self::assertSame('Unauthorized', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.2',
            'status' => 401,
            'title' => 'Unauthorized',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Unauthorized', $httpException->getMessage());
        self::assertSame(401, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testPaymentRequired(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createPaymentRequired(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.3', $httpException->getType());
        self::assertSame(402, $httpException->getStatus());
        self::assertSame('Payment Required', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.3',
            'status' => 402,
            'title' => 'Payment Required',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Payment Required', $httpException->getMessage());
        self::assertSame(402, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testForbidden(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createForbidden(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.4', $httpException->getType());
        self::assertSame(403, $httpException->getStatus());
        self::assertSame('Forbidden', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.4',
            'status' => 403,
            'title' => 'Forbidden',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Forbidden', $httpException->getMessage());
        self::assertSame(403, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testNotFound(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createNotFound(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.5', $httpException->getType());
        self::assertSame(404, $httpException->getStatus());
        self::assertSame('Not Found', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.5',
            'status' => 404,
            'title' => 'Not Found',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Not Found', $httpException->getMessage());
        self::assertSame(404, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testMethodNotAllowed(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createMethodNotAllowed(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.6', $httpException->getType());
        self::assertSame(405, $httpException->getStatus());
        self::assertSame('Method Not Allowed', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.6',
            'status' => 405,
            'title' => 'Method Not Allowed',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Method Not Allowed', $httpException->getMessage());
        self::assertSame(405, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testNotAcceptable(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createNotAcceptable(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.7', $httpException->getType());
        self::assertSame(406, $httpException->getStatus());
        self::assertSame('Not Acceptable', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.7',
            'status' => 406,
            'title' => 'Not Acceptable',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Not Acceptable', $httpException->getMessage());
        self::assertSame(406, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testProxyAuthenticationRequired(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createProxyAuthenticationRequired(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.8', $httpException->getType());
        self::assertSame(407, $httpException->getStatus());
        self::assertSame('Proxy Authentication Required', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.8',
            'status' => 407,
            'title' => 'Proxy Authentication Required',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Proxy Authentication Required', $httpException->getMessage());
        self::assertSame(407, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testRequestTimeout(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createRequestTimeout(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.9', $httpException->getType());
        self::assertSame(408, $httpException->getStatus());
        self::assertSame('Request Timeout', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.9',
            'status' => 408,
            'title' => 'Request Timeout',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Request Timeout', $httpException->getMessage());
        self::assertSame(408, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testConflict(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createConflict(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.10', $httpException->getType());
        self::assertSame(409, $httpException->getStatus());
        self::assertSame('Conflict', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.10',
            'status' => 409,
            'title' => 'Conflict',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Conflict', $httpException->getMessage());
        self::assertSame(409, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testGone(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createGone(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.11', $httpException->getType());
        self::assertSame(410, $httpException->getStatus());
        self::assertSame('Gone', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.11',
            'status' => 410,
            'title' => 'Gone',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Gone', $httpException->getMessage());
        self::assertSame(410, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testLengthRequired(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createLengthRequired(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.12', $httpException->getType());
        self::assertSame(411, $httpException->getStatus());
        self::assertSame('Length Required', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.12',
            'status' => 411,
            'title' => 'Length Required',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Length Required', $httpException->getMessage());
        self::assertSame(411, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testPreconditionFailed(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createPreconditionFailed(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.13', $httpException->getType());
        self::assertSame(412, $httpException->getStatus());
        self::assertSame('Precondition Failed', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.13',
            'status' => 412,
            'title' => 'Precondition Failed',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Precondition Failed', $httpException->getMessage());
        self::assertSame(412, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testRequestEntityTooLarge(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createRequestEntityTooLarge(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.14', $httpException->getType());
        self::assertSame(413, $httpException->getStatus());
        self::assertSame('Request Entity Too Large', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.14',
            'status' => 413,
            'title' => 'Request Entity Too Large',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Request Entity Too Large', $httpException->getMessage());
        self::assertSame(413, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testRequestURITooLong(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createRequestURITooLong(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.15', $httpException->getType());
        self::assertSame(414, $httpException->getStatus());
        self::assertSame('Request-URI Too Long', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.15',
            'status' => 414,
            'title' => 'Request-URI Too Long',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Request-URI Too Long', $httpException->getMessage());
        self::assertSame(414, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testUnsupportedMediaType(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createUnsupportedMediaType(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.16', $httpException->getType());
        self::assertSame(415, $httpException->getStatus());
        self::assertSame('Unsupported Media Type', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.16',
            'status' => 415,
            'title' => 'Unsupported Media Type',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Unsupported Media Type', $httpException->getMessage());
        self::assertSame(415, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testRangeNotSatisfiable(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createRangeNotSatisfiable(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.17', $httpException->getType());
        self::assertSame(416, $httpException->getStatus());
        self::assertSame('Range Not Satisfiable', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.17',
            'status' => 416,
            'title' => 'Range Not Satisfiable',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Range Not Satisfiable', $httpException->getMessage());
        self::assertSame(416, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testExpectationFailed(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createExpectationFailed(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.18', $httpException->getType());
        self::assertSame(417, $httpException->getStatus());
        self::assertSame('Expectation Failed', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.4.18',
            'status' => 417,
            'title' => 'Expectation Failed',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Expectation Failed', $httpException->getMessage());
        self::assertSame(417, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testImateapot(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createImateapot(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2324#section-2.3.2', $httpException->getType());
        self::assertSame(418, $httpException->getStatus());
        self::assertSame('I\'m a teapot', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2324#section-2.3.2',
            'status' => 418,
            'title' => 'I\'m a teapot',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('I\'m a teapot', $httpException->getMessage());
        self::assertSame(418, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testMisdirectedRequest(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createMisdirectedRequest(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc7540#section-9.1.2', $httpException->getType());
        self::assertSame(421, $httpException->getStatus());
        self::assertSame('Misdirected Request', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc7540#section-9.1.2',
            'status' => 421,
            'title' => 'Misdirected Request',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Misdirected Request', $httpException->getMessage());
        self::assertSame(421, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testUnprocessableEntity(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createUnprocessableEntity(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc4918#section-11.2', $httpException->getType());
        self::assertSame(422, $httpException->getStatus());
        self::assertSame('Unprocessable Entity', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc4918#section-11.2',
            'status' => 422,
            'title' => 'Unprocessable Entity',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Unprocessable Entity', $httpException->getMessage());
        self::assertSame(422, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testLocked(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createLocked(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc4918#section-11.3', $httpException->getType());
        self::assertSame(423, $httpException->getStatus());
        self::assertSame('Locked', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc4918#section-11.3',
            'status' => 423,
            'title' => 'Locked',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Locked', $httpException->getMessage());
        self::assertSame(423, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testFailedDependency(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createFailedDependency(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc4918#section-11.4', $httpException->getType());
        self::assertSame(424, $httpException->getStatus());
        self::assertSame('Failed Dependency', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc4918#section-11.4',
            'status' => 424,
            'title' => 'Failed Dependency',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Failed Dependency', $httpException->getMessage());
        self::assertSame(424, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testTooEarly(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createTooEarly(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc8470#section-5.2', $httpException->getType());
        self::assertSame(425, $httpException->getStatus());
        self::assertSame('Too Early', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc8470#section-5.2',
            'status' => 425,
            'title' => 'Too Early',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Too Early', $httpException->getMessage());
        self::assertSame(425, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testUpgradeRequired(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createUpgradeRequired(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc7231#section-6.5.15', $httpException->getType());
        self::assertSame(426, $httpException->getStatus());
        self::assertSame('Upgrade Required', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc7231#section-6.5.15',
            'status' => 426,
            'title' => 'Upgrade Required',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Upgrade Required', $httpException->getMessage());
        self::assertSame(426, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testPreconditionRequired(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createPreconditionRequired(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc6585#section-3', $httpException->getType());
        self::assertSame(428, $httpException->getStatus());
        self::assertSame('Precondition Required', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc6585#section-3',
            'status' => 428,
            'title' => 'Precondition Required',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Precondition Required', $httpException->getMessage());
        self::assertSame(428, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testTooManyRequests(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createTooManyRequests(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc6585#section-4', $httpException->getType());
        self::assertSame(429, $httpException->getStatus());
        self::assertSame('Too Many Requests', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc6585#section-4',
            'status' => 429,
            'title' => 'Too Many Requests',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Too Many Requests', $httpException->getMessage());
        self::assertSame(429, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testRequestHeaderFieldsTooLarge(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createRequestHeaderFieldsTooLarge(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc6585#section-7.3', $httpException->getType());
        self::assertSame(431, $httpException->getStatus());
        self::assertSame('Request Header Fields Too Large', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc6585#section-7.3',
            'status' => 431,
            'title' => 'Request Header Fields Too Large',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Request Header Fields Too Large', $httpException->getMessage());
        self::assertSame(431, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testUnavailableForLegalReasons(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createUnavailableForLegalReasons(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc7725#section-3', $httpException->getType());
        self::assertSame(451, $httpException->getStatus());
        self::assertSame('Unavailable For Legal Reasons', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc7725#section-3',
            'status' => 451,
            'title' => 'Unavailable For Legal Reasons',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Unavailable For Legal Reasons', $httpException->getMessage());
        self::assertSame(451, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testInternalServerError(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createInternalServerError(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.1', $httpException->getType());
        self::assertSame(500, $httpException->getStatus());
        self::assertSame('Internal Server Error', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.1',
            'status' => 500,
            'title' => 'Internal Server Error',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Internal Server Error', $httpException->getMessage());
        self::assertSame(500, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testNotImplemented(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createNotImplemented(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.2', $httpException->getType());
        self::assertSame(501, $httpException->getStatus());
        self::assertSame('Not Implemented', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.2',
            'status' => 501,
            'title' => 'Not Implemented',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Not Implemented', $httpException->getMessage());
        self::assertSame(501, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testBadGateway(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createBadGateway(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.3', $httpException->getType());
        self::assertSame(502, $httpException->getStatus());
        self::assertSame('Bad Gateway', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.3',
            'status' => 502,
            'title' => 'Bad Gateway',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Bad Gateway', $httpException->getMessage());
        self::assertSame(502, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testServiceUnavailable(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createServiceUnavailable(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.4', $httpException->getType());
        self::assertSame(503, $httpException->getStatus());
        self::assertSame('Service Unavailable', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.4',
            'status' => 503,
            'title' => 'Service Unavailable',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Service Unavailable', $httpException->getMessage());
        self::assertSame(503, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testGatewayTimeout(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createGatewayTimeout(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.5', $httpException->getType());
        self::assertSame(504, $httpException->getStatus());
        self::assertSame('Gateway Timeout', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.5',
            'status' => 504,
            'title' => 'Gateway Timeout',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Gateway Timeout', $httpException->getMessage());
        self::assertSame(504, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testHTTPVersionNotSupported(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createHTTPVersionNotSupported(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.6', $httpException->getType());
        self::assertSame(505, $httpException->getStatus());
        self::assertSame('HTTP Version Not Supported', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2616#section-10.5.6',
            'status' => 505,
            'title' => 'HTTP Version Not Supported',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('HTTP Version Not Supported', $httpException->getMessage());
        self::assertSame(505, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testVariantAlsoNegotiates(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createVariantAlsoNegotiates(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2295#section-8.1', $httpException->getType());
        self::assertSame(506, $httpException->getStatus());
        self::assertSame('Variant Also Negotiates', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2295#section-8.1',
            'status' => 506,
            'title' => 'Variant Also Negotiates',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Variant Also Negotiates', $httpException->getMessage());
        self::assertSame(506, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testInsufficientStorage(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createInsufficientStorage(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc4918#section-11.5', $httpException->getType());
        self::assertSame(507, $httpException->getStatus());
        self::assertSame('Insufficient Storage', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc4918#section-11.5',
            'status' => 507,
            'title' => 'Insufficient Storage',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Insufficient Storage', $httpException->getMessage());
        self::assertSame(507, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testLoopDetected(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createLoopDetected(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc5842#section-7.2', $httpException->getType());
        self::assertSame(508, $httpException->getStatus());
        self::assertSame('Loop Detected', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc5842#section-7.2',
            'status' => 508,
            'title' => 'Loop Detected',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Loop Detected', $httpException->getMessage());
        self::assertSame(508, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testNotExtended(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createNotExtended(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc2774#section-7', $httpException->getType());
        self::assertSame(510, $httpException->getStatus());
        self::assertSame('Not Extended', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc2774#section-7',
            'status' => 510,
            'title' => 'Not Extended',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Not Extended', $httpException->getMessage());
        self::assertSame(510, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }

    public function testNetworkAuthenticationRequired(): void
    {
        $exception = new \RuntimeException('error');

        $httpException = HttpException::createNetworkAuthenticationRequired(['key1' => 'value1', 'key2' => 'value2'], $exception);

        self::assertSame('https://datatracker.ietf.org/doc/html/rfc6585#section-6', $httpException->getType());
        self::assertSame(511, $httpException->getStatus());
        self::assertSame('Network Authentication Required', $httpException->getTitle());
        self::assertSame([
            'type' => 'https://datatracker.ietf.org/doc/html/rfc6585#section-6',
            'status' => 511,
            'title' => 'Network Authentication Required',
            'key1' => 'value1',
            'key2' => 'value2',
        ], $httpException->jsonSerialize());

        self::assertSame('Network Authentication Required', $httpException->getMessage());
        self::assertSame(511, $httpException->getCode());
        self::assertSame($exception, $httpException->getPrevious());
    }
}
