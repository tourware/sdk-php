<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Sigmie\Http\Contracts\JSONClient;
use Tourware\Clients\TravelClient;
use Tourware\Clients\WriteClient as WriteClient;
use Tourware\Contracts\WriteClient as WriteClientInterface;

class Raw extends WriteEntity
{
    public function __construct(protected string $endpoint)
    {
    }

    public function endpoint(): string
    {
        return $this->endpoint;
    }

    public function client(JSONClient $http): WriteClientInterface
    {
        return new WriteClient($http, $this);
    }
}
