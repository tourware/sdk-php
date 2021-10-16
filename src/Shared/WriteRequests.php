<?php

declare(strict_types=1);

namespace Tourware\Shared;

use GuzzleHttp\Psr7\Stream;
use Psr\Http\Message\RequestInterface;
use Tourware\Requests\ApiRequest;

trait WriteRequests
{

    protected static ?Stream $stream = null;

    public static function fakeStream(Stream $stream)
    {
        self::$stream = $stream;
    }

    abstract protected function endpoint(): string;

    protected function updateRequest(string $identifier, array $payload): RequestInterface
    {
        $request = new ApiRequest('PUT', "{$this->endpoint()}/{$identifier}", $payload);

        return (is_null(self::$stream)) ? $request : $request->withBody(self::$stream);
    }

    protected function destroyRequest(string $indetifier): RequestInterface
    {
        $request =  new ApiRequest('DELETE', "{$this->endpoint()}/{$indetifier}");

        return (is_null(self::$stream)) ? $request : $request->withBody(self::$stream);
    }

    protected function createRequest(array $payload): RequestInterface
    {
        $request = new ApiRequest('POST', "{$this->endpoint()}", $payload);

        return (is_null(self::$stream)) ? $request : $request->withBody(self::$stream);
    }
}
