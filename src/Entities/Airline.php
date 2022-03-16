<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Airline extends ReadEntity
{
    public function endpoint(): string
    {
        return 'airlines';
    }
}
