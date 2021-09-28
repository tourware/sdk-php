<?php

declare(strict_types=1);

namespace Tourware\Entities;

class OperationRequest extends WriteEntity
{
    public function endpoint(): string
    {
        return 'operationsrequests';
    }
}
