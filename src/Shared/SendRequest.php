<?php

declare(strict_types=1);

namespace Tourware\Shared;

use Psr\Http\Message\RequestInterface;
use Tourware\Contracts\Sort as SortInterface;
use Tourware\Contracts\SortBuilder as SortBuilderInterface;
use Tourware\Sort\SortBuilder;
use GuzzleHttp\Client as Http;

trait SendRequest
{
    protected Http $http;

    protected function sendRequest(RequestInterface $request): array
    {
        $contents = $this->http->sendRequest($request)->getBody()->getContents();

        return json_decode($contents, true);
    }
}
