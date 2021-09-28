<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Destination extends WriteEntity
{
    public function endpoint(): string
    {
        return 'destinations';
    }
}
