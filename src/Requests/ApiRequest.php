<?php

declare(strict_types=1);

namespace Tourware\Requests;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

class ApiRequest extends Request
{
    public function __construct(string $method, string $uri, ?array $body = null)
    {
        $uri = new Uri("/api/{$uri}");

        parent::__construct($method, $uri, [], json_encode($body));
    }
}
