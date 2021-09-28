<?php

declare(strict_types=1);

namespace Tourware\Clients;

use Tourware\Contracts\Entity;
use Tourware\Contracts\QueryBuilder as QueryBuilderInterface;
use Tourware\Entities\Travel;

class TravelClient extends WriteClient
{
    // Example for how we can extend the BaseClient to 
    // create helpfull methods for common tasks
    // public function active(): QueryBuilderInterface
    // {
    //     return $this->query()->filter('isActive')->equals(true);
    // }

    protected function entity(): Entity
    {
        return new Travel;
    }
}
