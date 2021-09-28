<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Sigmie\Http\Contracts\JSONClient;
use Tourware\Clients\TravelClient;
use Tourware\Contracts\WriteClient;

class Travel extends WriteEntity
{
    public function endpoint(): string
    {
        return 'travels';
    }

    public function client(JSONClient $http): WriteClient
    {
        return new TravelClient($http, $this);
    }
}
