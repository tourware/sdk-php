<?php

declare(strict_types=1);

namespace Tourware\Entities;

class AgencyCommissionRule extends ReadEntity
{
    public function endpoint(): string
    {
        return 'agencycommissionrules';
    }
}
