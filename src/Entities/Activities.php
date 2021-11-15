<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Activities extends WriteEntity
{
    public function endpoint(): string
    {
        return 'activities';
    }
}
