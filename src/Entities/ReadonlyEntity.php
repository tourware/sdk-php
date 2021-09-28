<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Sigmie\Http\Contracts\JSONClient;
use Tourware\Clients\BaseClient;
use Tourware\Clients\ReadClient;
use Tourware\Contracts\Entity as EntityInterface;
use Tourware\Contracts\ReadClient as ReadClientInterface;

abstract class ReadonlyEntity implements EntityInterface
{
    public function client(JSONClient $http): ReadClientInterface
    {
        return new ReadClient($http, $this);
    }

    abstract public function endpoint(): string;
}
