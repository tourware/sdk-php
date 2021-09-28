<?php

declare(strict_types=1);

namespace Tourware\Entities;


class VacationRentalAmenity extends ReadonlyEntity
{
    public function endpoint(): string
    {
        return 'vacationrentalsamenities';
    }
}
