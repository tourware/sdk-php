<?php

declare(strict_types=1);

namespace Tourware\Entities;

use GuzzleHttp\Client as Http;
use Tourware\Clients\MeClient;
use Tourware\Contracts\ReadClient;

class Me extends ReadEntity
{
    public function endpoint(): string
    {
        return 'me';
    }

    public function client(Http $http): ReadClient
    {
        return new MeClient($http, $this);
    }
}
