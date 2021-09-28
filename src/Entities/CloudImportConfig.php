<?php

declare(strict_types=1);

namespace Tourware\Entities;

class CloudImportConfig extends WriteEntity
{
    public function endpoint(): string
    {
        return 'cloudimportconfigs';
    }
}
