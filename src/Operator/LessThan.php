<?php

declare(strict_types=1);

namespace Tourware\Operator;

use Tourware\Contracts\Filter;
use Tourware\Query\Property;

class LessThan implements Filter
{
    public function __construct(protected string $property, protected int $number)
    {
    }

    public function property(): string
    {
        return $this->property;
    }

    public function operator(): string
    {
        return 'lessThan';
    }

    public function value(): string|array|bool|int
    {
        return $this->number;
    }

    public function raw(): array
    {
        return [
            'property' => $this->property,
            'operator' => $this->operator(),
            'value' => $this->number
        ];
    }
}
