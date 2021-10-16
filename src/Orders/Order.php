<?php

declare(strict_types=1);

namespace Tourware\Orders;

use Tourware\Contracts\Sort;
use Tourware\Query\Property;

abstract class Order implements Sort
{
    protected string $property;

    public function __construct(string $property)
    {
        $this->property = $property;
    }

    public function property(): string
    {
        return $this->property;
    }

    abstract public function direction(): string;

    public function raw(): array
    {
        return [
            'property' => $this->property,
            'direction' => $this->direction(),
        ];
    }
}
