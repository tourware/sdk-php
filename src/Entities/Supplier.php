<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Supplier extends WriteEntity
{
    public function endpoint(): string
    {
        return 'suppliers';
    }
}
