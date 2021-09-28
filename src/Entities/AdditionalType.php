<?php

declare(strict_types=1);

namespace Tourware\Entities;

class AdditionalType extends ReadEntity
{
    public function endpoint(): string
    {
        return 'additionaltypes';
    }
}
