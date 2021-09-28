<?php

declare(strict_types=1);

namespace Tourware\Entities;


class MealType extends ReadEntity
{
    public function endpoint(): string
    {
        return 'mealtypes';
    }
}
