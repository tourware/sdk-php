<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Tourware\Entities\ReadonlyEntity as BaseEntity;

class Language extends ReadonlyEntity
{
    public function endpoint(): string
    {
        return 'languages';
    }
}
