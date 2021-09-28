<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Tag extends WriteEntity
{
    public function endpoint(): string
    {
        return 'tags';
    }
}
