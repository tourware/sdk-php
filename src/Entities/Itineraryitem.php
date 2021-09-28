<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Itineraryitem extends WriteEntity
{
    public function endpoint(): string
    {
        return 'itineraryitems';
    }
}
