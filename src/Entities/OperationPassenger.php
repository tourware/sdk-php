<?php

declare(strict_types=1);

namespace Tourware\Entities;

class OperationPassenger extends WriteEntity
{
    public function endpoint(): string
    {
        return 'operationspassengers';
    }
}
