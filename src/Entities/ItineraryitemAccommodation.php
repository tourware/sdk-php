<?php

declare(strict_types=1);

namespace Tourware\Entities;

class ItineraryitemAccommodation extends WriteEntity
{
    public function endpoint(): string
    {
        return 'itineraryitemsaccommodations';
    }
}
