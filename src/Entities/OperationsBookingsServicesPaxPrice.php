<?php

declare(strict_types=1);

namespace Tourware\Entities;

class OperationsBookingsServicesPaxPrice extends ReadEntity
{
    public function endpoint(): string
    {
        return 'operationsbookingsservicespaxprices';
    }
}
