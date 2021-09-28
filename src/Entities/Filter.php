<?php

declare(strict_types=1);

namespace Tourware\Entities;


class Filter extends WriteEntity
{
    public function endpoint(): string
    {
        return 'filters';
    }
}
