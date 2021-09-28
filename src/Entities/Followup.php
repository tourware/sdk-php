<?php

declare(strict_types=1);

namespace Tourware\Entities;


class Followup extends WriteEntity
{
    public function endpoint(): string
    {
        return 'followups';
    }
}
