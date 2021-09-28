<?php

declare(strict_types=1);

namespace Tourware\Entities;


class File extends WriteEntity
{
    public function endpoint(): string
    {
        return 'files';
    }
}
