<?php

declare(strict_types=1);

namespace Tourware\Operator;

use Tourware\Contracts\Filter;

class Equals implements Filter
{
    public function __construct(protected string $property, protected int|string|bool $value)
    {
    }

    public function property(): string
    {
        return $this->property;
    }

    public function operator(): string
    {
        return 'equals';
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
