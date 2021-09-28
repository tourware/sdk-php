<?php

declare(strict_types=1);

namespace Tourware\Entities;

class AdditionalBookableService extends WriteEntity
{
    public function endpoint(): string
    {
        return 'additionalbookableservice';
    }
}
