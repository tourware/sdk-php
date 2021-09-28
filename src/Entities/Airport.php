<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Airport extends ReadonlyEntity
{
    public function endpoint(): string
    {
        return 'airports';
    }
}
