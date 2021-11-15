<?php

declare(strict_types=1);

namespace Tourware\Shared;

use Adbar\Dot;
use GuzzleHttp\Client as Http;
use Psr\Http\Message\RequestInterface;

trait SendRequest
{
    protected Http $http;

    protected function sendRequest(RequestInterface $request): Dot
    {
        $contents = $this->http->sendRequest($request)->getBody()->getContents();

        return dot(json_decode($contents, true));
    }
}
