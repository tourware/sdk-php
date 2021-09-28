<?php

declare(strict_types=1);

namespace Tourware\Entities;


class Roundtrip extends ReadonlyEntity
{
    public function endpoint(): string
    {
        return 'roundtrips';
    }
}
