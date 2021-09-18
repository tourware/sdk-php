<?php

declare(strict_types=1);

namespace Tourware\Clients;

use Tourware\Contracts\Entity;
use Tourware\Entities\Travel;
use Tourware\QueryBuilder;

class TravelClient extends BaseClient
{
    protected function entity(): Entity
    {
        return new Travel;
    }

    public function query()
    {
        return new QueryBuilder($this->http, $this->entity());
    }

    public function active()
    {
        return;
    }
}
