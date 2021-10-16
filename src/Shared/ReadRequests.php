<?php

declare(strict_types=1);

namespace Tourware\Shared;

use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Sigmie\Http\Contracts\JSONRequest;
use Tourware\Requests\ApiRequest;

trait ReadRequests
{
    protected static ?Stream $stream = null;

    public static function fakeStream(Stream $stream)
    {
        self::$stream = $stream;
    }
    abstract protected function endpoint(): string;

    protected function showRequest(string $identifier): RequestInterface
    {
        $request = new ApiRequest('GET', "{$this->endpoint()}/{$identifier}");

        return (is_null(self::$stream)) ? $request : $request->withBody(self::$stream);
    }

    protected function listRequest(int $offset, int $limit): RequestInterface
    {
        $uri = new Uri("{$this->endpoint()}");
        $uri = Uri::withQueryValue($uri, 'limit', (string) $limit);
        $uri = Uri::withQueryValue($uri, 'skip', (string) $offset);

        $request = new ApiRequest('GET', (string) $uri);

        return (is_null(self::$stream)) ? $request : $request->withBody(self::$stream);
    }
}
