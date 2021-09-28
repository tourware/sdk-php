<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Relation extends WriteEntity
{
    public function endpoint(): string
    {
        return 'relations';
    }
}
