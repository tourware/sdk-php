<?php

declare(strict_types=1);

namespace Tourware\Entities;

class FlightSegment extends ReadEntity
{
    public function endpoint(): string
    {
        return 'flightsegments';
    }
}
