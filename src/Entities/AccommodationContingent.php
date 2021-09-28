<?php

declare(strict_types=1);

namespace Tourware\Entities;

class AccommodationContingent extends WriteEntity
{
    public function endpoint(): string
    {
        return 'accommodationscontingents';
    }
}
