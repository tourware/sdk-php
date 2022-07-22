<?php

declare(strict_types=1);

namespace Tourware\Entities;

class CancellationSchema extends ReadEntity
{
    public function endpoint(): string
    {
        return 'cancellationschemas';
    }
}
