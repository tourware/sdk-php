<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Tourware\Entities\ReadonlyEntity as BaseEntity;

class OperationPayment extends BaseEntity
{
    public function endpoint(): string
    {
        return 'operationspayments';
    }
}
