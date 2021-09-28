<?php

declare(strict_types=1);

namespace Tourware\Orders;

use Tourware\Contracts\Sort;

class Asc extends Order implements Sort
{
    public function direction(): string
    {
        return 'asc';
    }
}
