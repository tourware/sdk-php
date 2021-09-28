<?php

declare(strict_types=1);

namespace Tourware\Entities;

class VacationRentalPeriod extends WriteEntity
{
    public function endpoint(): string
    {
        return 'vacationrentalsperiods';
    }
}
