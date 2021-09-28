<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Resource extends WriteEntity
{
    public function endpoint(): string
    {
        return 'resources';
    }
}
