<?php

declare(strict_types=1);

namespace Tourware\Entities;

use Tourware\Entities\ReadonlyEntity;

class AdditionalType extends ReadonlyEntity
{
    public function endpoint(): string
    {
        return 'additionaltypes';
    }
}
