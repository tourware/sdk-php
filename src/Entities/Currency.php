<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Currency extends ReadonlyEntity
{
    public function endpoint(): string
    {
        return 'currencies';
    }
}
