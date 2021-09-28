<?php

declare(strict_types=1);

namespace Tourware\Entities;

class ResourceRecord extends WriteEntity
{
    public function endpoint(): string
    {
        return 'resourcesrecords';
    }
}
