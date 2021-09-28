<?php

declare(strict_types=1);

namespace Tourware\Entities;


class ItineraryitemService extends WriteEntity
{
    public function endpoint(): string
    {
        return 'itineraryitemsservices';
    }
}
