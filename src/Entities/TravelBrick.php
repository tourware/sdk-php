<?php

declare(strict_types=1);

namespace Tourware\Entities;


class TravelBrick extends WriteEntity
{
    public function endpoint(): string
    {
        return 'travelsbricks';
    }
}
