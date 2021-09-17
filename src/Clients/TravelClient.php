<?php

declare(strict_types=1);

namespace Tourware\Clients;

use Tourware\Contracts\Entity;
use Tourware\Entities\Travel;

class TravelClient extends BaseClient
{
    protected function entity(): Entity
    {
        return new Travel;
    }
}
