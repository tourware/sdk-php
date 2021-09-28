<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Tourware\Entities\ReadonlyEntity as BaseEntity;

class OperationBookingService extends BaseEntity
{
    public function endpoint(): string
    {
        return 'operationsbookingsservices';
    }
}
