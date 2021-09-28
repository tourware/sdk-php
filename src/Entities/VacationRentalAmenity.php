<?php

declare(strict_types=1);

namespace Tourware\Entities;

class VacationRentalAmenity extends ReadEntity
{
    public function endpoint(): string
    {
        return 'vacationrentalsamenities';
    }
}
