<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Tourware\Entities\Entity as BaseEntity;

class TravelSeason extends BaseEntity
{
    public function alias(): string
    {
        return 'travelsseasons';
    }
}
