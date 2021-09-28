<?php

declare(strict_types=1);

namespace Tourware\Entities;


class AccommodationPeriod extends WriteEntity
{
    public function endpoint(): string
    {
        return 'accommodationsperiods';
    }
}
