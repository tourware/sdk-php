<?php

declare(strict_types=1);

namespace Tourware\Entities;

use GuzzleHttp\Client as Http;
use Tourware\Clients\ReadClient;
use Tourware\Contracts\Entity as EntityInterface;
use Tourware\Contracts\ReadClient as ReadClientInterface;

abstract class ReadEntity implements EntityInterface
{
    public function client(Http $http): ReadClientInterface
    {
        return new ReadClient($http, $this);
    }

    abstract public function endpoint(): string;
}
