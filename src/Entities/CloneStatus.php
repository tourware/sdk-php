<?php

declare(strict_types=1);

namespace Tourware\Entities;


class CloneStatus extends WriteEntity
{
    public function endpoint(): string
    {
        return 'clonestatus';
    }
}
