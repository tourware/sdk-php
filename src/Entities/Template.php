<?php

declare(strict_types=1);

namespace Tourware\Entities;


class Template extends WriteEntity
{
    public function endpoint(): string
    {
        return 'templates';
    }
}
