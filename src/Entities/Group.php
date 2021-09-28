<?php

declare(strict_types=1);

namespace Tourware\Entities;


class Group extends WriteEntity
{
    public function endpoint(): string
    {
        return 'groups';
    }
}
