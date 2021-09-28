<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Sigmie\Http\Contracts\JSONClient;
use Tourware\Clients\BaseClient;
use Tourware\Clients\WriteClient;
use Tourware\Contracts\Entity as EntityInterface;

abstract class WriteEntity implements EntityInterface
{
    public function client(JSONClient $http)
    {
        return new WriteClient($http, $this);
    }

    abstract public function endpoint(): string;
}
