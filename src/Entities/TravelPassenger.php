<?php

declare(strict_types=1);

namespace Tourware\Entities;

class TravelPassenger extends WriteEntity
{
    public function endpoint(): string
    {
        return 'travelspassengers';
    }
}
