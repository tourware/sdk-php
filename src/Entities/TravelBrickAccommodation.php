<?php

declare(strict_types=1);

namespace Tourware\Entities;

class TravelBrickAccommodation extends WriteEntity
{
    public function endpoint(): string
    {
        return 'travelsbricksaccommodations';
    }
}
