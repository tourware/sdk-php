<?php

declare(strict_types=1);

namespace Tourware\Operator;

use Tourware\Contracts\Filter;
use Tourware\Filter\Filter as FilterFilter;
use Tourware\Query\Property;

class In implements Filter
{
    public function __construct(protected string $property, protected array $values)
    {
    }

    public function property(): string
    {
        return $this->property;
    }

    public function operator(): string
    {
        return 'in';
    }

    public function value(): string|array|bool|int
    {
        return $this->values;
    }

    public function raw(): array
    {
        return [
            'property' => $this->property,
            'operator' => $this->operator(),
            'value' => $this->values
        ];
    }
}
