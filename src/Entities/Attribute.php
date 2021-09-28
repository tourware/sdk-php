<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Attribute extends WriteEntity
{
    public function endpoint(): string
    {
        return 'attributes';
    }
}
