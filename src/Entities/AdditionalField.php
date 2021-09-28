<?php

declare(strict_types=1);

namespace Tourware\Entities;

class AdditionalField extends WriteEntity
{
    public function endpoint(): string
    {
        return 'additionalfields';
    }
}
