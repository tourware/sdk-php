<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Accomondation extends WriteEntity
{
    public function endpoint(): string
    {
        return 'accommodations';
    }
}
