<?php

declare(strict_types=1);

namespace Tourware\Entities;


class PriceGroup extends WriteEntity
{
    public function endpoint(): string
    {
        return 'pricegroups';
    }
}
