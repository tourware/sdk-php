<?php

declare(strict_types=1);

namespace Tourware\Entities;

use GuzzleHttp\Client as Http;
use Tourware\Clients\WriteClient as WriteClient;
use Tourware\Contracts\WriteClient as WriteClientInterface;

class Raw extends WriteEntity
{
    protected string $endpoint;

    public function __construct(string $endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function endpoint(): string
    {
        return $this->endpoint;
    }

    public function client(Http $http): WriteClientInterface
    {
        return new WriteClient($http, $this);
    }
}
