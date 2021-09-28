<?php

declare(strict_types=1);

namespace Tourware\Entities;


class RecordFollower extends WriteEntity
{
    public function endpoint(): string
    {
        return 'recordfollowers';
    }
}
