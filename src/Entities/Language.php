<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Language extends ReadEntity
{
    public function endpoint(): string
    {
        return 'languages';
    }
}
