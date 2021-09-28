<?php

declare(strict_types=1);

namespace Tourware\Entities;


class OperationPayment extends WriteEntity
{
    public function endpoint(): string
    {
        return 'operationspayments';
    }
}
