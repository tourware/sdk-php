<?php

declare(strict_types=1);

namespace Tourware\Clients;

use Tourware\Contracts\Entity;
use Tourware\Entities\Accomondations;

class AccomondationsClient extends BaseClient
{
    protected function entity(): Entity
    {
        return new Accomondations;
    }
}
