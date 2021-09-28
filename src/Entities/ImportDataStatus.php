<?php

declare(strict_types=1);

namespace Tourware\Entities;

class ImportDataStatus extends WriteEntity
{
    public function endpoint(): string
    {
        return 'importdatastatus';
    }
}
