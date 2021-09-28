<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Tourware\Entities\ReadonlyEntity as BaseEntity;

class Itineraryitem extends WriteEntity
{
    public function endpoint(): string
    {
        return 'itineraryitems';
    }
}
