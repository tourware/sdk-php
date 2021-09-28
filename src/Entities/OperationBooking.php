<?php

declare(strict_types=1);

namespace Tourware\Entities;


class OperationBooking extends WriteEntity
{
    public function endpoint(): string
    {
        return 'operationsbookings';
    }
}
