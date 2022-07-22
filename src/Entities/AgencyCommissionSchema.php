<?php

declare(strict_types=1);

namespace Tourware\Entities;

class AgencyCommissionSchema extends ReadEntity
{
    public function endpoint(): string
    {
        return 'agencycommissionschemas';
    }
}
