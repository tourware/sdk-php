<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Tourware\Entities\ReadonlyEntity as BaseEntity;

class Attribute extends BaseEntity
{
    public function endpoint(): string
    {
        return 'attributes';
    }
}
