<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Sigmie\Http\Contracts\JSONClient;
use Tourware\Clients\TravelClient;
use Tourware\Contracts\WriteClient;
use GuzzleHttp\Client as Http;

class Travel extends WriteEntity
{
    public function endpoint(): string
    {
        return 'travels';
    }

    public function client(Http $http): WriteClient
    {
        return new TravelClient($http, $this);
    }
}
