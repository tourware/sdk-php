<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Subtype extends ReadEntity
{
    public function endpoint(): string
    {
        return 'subtypes';
    }
}
