<?php

declare(strict_types=1);

namespace Tourware\Entities;

class CancellationRule extends ReadEntity
{
    public function endpoint(): string
    {
        return 'cancellationrules';
    }
}
