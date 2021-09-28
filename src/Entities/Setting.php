<?php

declare(strict_types=1);

namespace Tourware\Entities;


class Setting extends WriteEntity
{
    public function endpoint(): string
    {
        return 'settings';
    }
}
