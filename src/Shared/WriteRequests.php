<?php

declare(strict_types=1);

namespace Tourware\Shared;

use GuzzleHttp\Psr7\Stream;
use Sigmie\Http\Contracts\JSONRequest;
use Tourware\Requests\ApiRequest;

trait WriteRequests
{
    abstract protected function endpoint(): string;

    protected static null|Stream $stream = null;

    public static function fakeStream(Stream $stream)
    {
        self::$stream = $stream;
    }

    protected function updateRequest(string $identifier, array $payload): JSONRequest
    {
        $request = new ApiRequest('PUT', "{$this->endpoint()}/{$identifier}", $payload);

        return (is_null(self::$stream)) ? $request : $request->withBody(self::$stream);
    }

    protected function destroyRequest(string $indetifier): JSONRequest
    {
        $request =  new ApiRequest('DELETE', "{$this->endpoint()}/{$indetifier}");

        return (is_null(self::$stream)) ? $request : $request->withBody(self::$stream);
    }

    protected function createRequest(array $payload): JSONRequest
    {
        $request = new ApiRequest('POST', "{$this->endpoint()}", $payload);

        return (is_null(self::$stream)) ? $request : $request->withBody(self::$stream);
    }
}
