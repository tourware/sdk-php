<?php

declare(strict_types=1);

namespace Tourware\Orders;

use Tourware\Contracts\Filter;
use Tourware\Contracts\Sort;
use Tourware\Filter\Filter as FilterFilter;
use Tourware\Query\Property;

class Desc extends Order implements Sort
{
    public function direction(): string
    {
        return 'desc';
    }
}
