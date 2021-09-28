<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Folder extends WriteEntity
{
    public function endpoint(): string
    {
        return 'folders';
    }
}
