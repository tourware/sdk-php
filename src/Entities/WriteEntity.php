<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Tourware\Clients\WriteClient;
use Tourware\Contracts\Entity as EntityInterface;
use GuzzleHttp\Client as Http;

abstract class WriteEntity implements EntityInterface
{
    public function client(Http $http)
    {
        return new WriteClient($http, $this);
    }

    abstract public function endpoint(): string;
}
