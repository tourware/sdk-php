<?php

declare(strict_types=1);

namespace Tourware\Entities;

class PriceCategory extends WriteEntity
{
    public function endpoint(): string
    {
        return 'pricecategories';
    }
}
