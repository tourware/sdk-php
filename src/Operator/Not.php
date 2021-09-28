<?php

declare(strict_types=1);

namespace Tourware\Operator;

use Tourware\Contracts\Filter;
use Tourware\Query\Property;

class Not implements Filter
{
    public function __construct(protected string $property, protected int|bool|string $value)
    {
    }

    public function property(): string
    {
        return $this->property;
    }

    public function operator(): string
    {
        return 'not';
    }

    public function value(): string|array|bool|int
    {
        return $this->value;
    }

    public function raw(): array
    {
        return [
            'property' => $this->property,
            'operator' => $this->operator(),
            'value' => $this->value
        ];
    }
}
