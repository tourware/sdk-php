<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Pois extends WriteEntity
{
    public function endpoint(): string
    {
        return 'pois';
    }
}
