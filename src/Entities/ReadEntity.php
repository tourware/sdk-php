<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Sigmie\Http\Contracts\JSONClient;
use Tourware\Clients\ReadClient;
use Tourware\Contracts\Entity as EntityInterface;
use Tourware\Contracts\ReadClient as ReadClientInterface;
use GuzzleHttp\Client as Http;

abstract class ReadEntity implements EntityInterface
{
    public function client(Http $http): ReadClientInterface
    {
        return new ReadClient($http, $this);
    }

    abstract public function endpoint(): string;
}
