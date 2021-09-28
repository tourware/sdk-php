<?php

declare(strict_types=1);

namespace Tourware\Entities;


class VacationRentalPriceModification extends WriteEntity
{
    public function endpoint(): string
    {
        return 'vacationrentalspricemodifications';
    }
}
