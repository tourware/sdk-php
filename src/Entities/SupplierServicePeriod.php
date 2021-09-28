<?php

declare(strict_types=1);

namespace Tourware\Entities;

class SupplierServicePeriod extends WriteEntity
{
    public function endpoint(): string
    {
        return 'suppliersservicesperiods';
    }
}
