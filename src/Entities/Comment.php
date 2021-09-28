<?php

declare(strict_types=1);

namespace Tourware\Entities;


class Comment extends WriteEntity
{
    public function endpoint(): string
    {
        return 'comments';
    }
}
