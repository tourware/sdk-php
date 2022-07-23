<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Adbar\Dot;
use GuzzleHttp\Client as Http;
use Tourware\Clients\WriteClient as WriteClient;
use Tourware\Contracts\WriteClient as WriteClientInterface;
use Tourware\Requests\ApiRequest;
use Tourware\Shared\SendRequest;
use GuzzleHttp\Psr7\Request;

class Custom
{
    use SendRequest;

    protected string $endpoint;
    protected string $method;

    protected ?array $body;
    protected ?array $options;

    public function __construct(Http $http, string $endpoint, string $method, ?array $body = null)
    {
        $this->http = $http;
        $this->body = $body;
        $this->endpoint = $endpoint;
        $this->method = $method;
        $this->options = [];
    }

    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    public function call(): Dot
    {
        $request = new Request(
            $this->method,
            $this->endpoint,
            [],
            $this->body
        );

        return $this->sendRequest($request, $this->options);
    }
}
