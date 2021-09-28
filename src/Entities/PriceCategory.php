<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Tourware\Entities\ReadonlyEntity as BaseEntity;

class PriceCategory extends WriteEntity
{
    public function endpoint(): string
    {
        return 'pricecategories';
    }
}
