<?php

declare(strict_types=1);

namespace Tourware\Requests;

use GuzzleHttp\Psr7\Uri;
use Sigmie\Http\JSONRequest;

class ApiRequest extends JSONRequest
{
    public function __construct(string $method, string $uri, ?array $body = null)
    {
        $uri = new Uri("/api/{$uri}");

        parent::__construct($method, $uri, $this->headers, $body);
    }
}
