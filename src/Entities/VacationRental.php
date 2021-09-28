<?php

declare(strict_types=1);

namespace Tourware\Entities;


class VacationRental extends WriteEntity
{
    public function endpoint(): string
    {
        return 'vacationrentals';
    }
}
