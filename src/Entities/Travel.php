<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Sigmie\Http\Contracts\JSONClient;
use Tourware\Clients\TravelClient;
use Tourware\Contracts\WriteClient;
use Tourware\Entities\ReadonlyEntity as BaseEntity;

class Travel extends BaseEntity
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
