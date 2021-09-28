<?php

declare(strict_types=1);

namespace Tourware\Entities;


class Language extends ReadonlyEntity
{
    public function endpoint(): string
    {
        return 'languages';
    }
}
