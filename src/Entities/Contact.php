<?php

declare(strict_types=1);

namespace Tourware\Entities;

class Contact extends WriteEntity
{
    public function endpoint(): string
    {
        return 'contacts';
    }
}
