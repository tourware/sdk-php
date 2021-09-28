<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Country extends ReadonlyEntity
{
    public function endpoint(): string
    {
        return 'countries';
    }
}
