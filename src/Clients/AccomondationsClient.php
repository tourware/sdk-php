<?php

declare(strict_types=1);

namespace Tourware\Clients;

use Tourware\Contracts\Entity;
use Tourware\Entities\Accomondation;

class AccomondationsClient extends BaseClient
{
    protected function entity(): Entity
    {
        return new Accomondation;
    }
}
