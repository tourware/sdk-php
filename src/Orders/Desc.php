<?php

declare(strict_types=1);

namespace Tourware\Orders;

use Tourware\Contracts\Sort;

class Desc extends Order implements Sort
{
    public function direction(): string
    {
        return 'desc';
    }
}
