<?php

declare(strict_types=1);

namespace Tourware\Entities;

class User extends WriteEntity
{
    public function endpoint(): string
    {
        return 'users';
    }
}
