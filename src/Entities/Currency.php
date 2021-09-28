<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Currency extends ReadEntity
{
    public function endpoint(): string
    {
        return 'currencies';
    }
}
