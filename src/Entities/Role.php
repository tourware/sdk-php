<?php

declare(strict_types=1);

namespace Tourware\Entities;


class Role extends WriteEntity
{
    public function endpoint(): string
    {
        return 'roles';
    }
}
