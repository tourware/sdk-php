<?php

declare(strict_types=1);

namespace Tourware\Entities;

class ContactCompany extends WriteEntity
{
    public function endpoint(): string
    {
        return 'contactscompanies';
    }
}
