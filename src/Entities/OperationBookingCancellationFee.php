<?php

declare(strict_types=1);

namespace Tourware\Entities;

class OperationBookingCancellationFee extends WriteEntity
{
    public function endpoint(): string
    {
        return 'operationsbookingscancellationfees';
    }
}
