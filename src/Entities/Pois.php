<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Tourware\Entities\ReadonlyEntity as BaseEntity;

class Pois extends WriteEntity
{
    public function endpoint(): string
    {
        return 'pois';
    }
}
