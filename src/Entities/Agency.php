<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Agency extends ReadEntity
{
    public function endpoint(): string
    {
        return 'agencies';
    }
}
