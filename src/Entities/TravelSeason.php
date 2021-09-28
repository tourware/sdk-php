<?php

declare(strict_types=1);

namespace Tourware\Entities;


class TravelSeason extends WriteEntity
{
    public function endpoint(): string
    {
        return 'travelsseasons';
    }
}
