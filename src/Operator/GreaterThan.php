<?php

declare(strict_types=1);

namespace Tourware\Operator;

use Tourware\Contracts\Filter;
use Tourware\Query\Property;

class GreaterThan implements Filter
{
    protected string $property;

    protected int $number;

    public function __construct(string $property, int $number)
    {
        $this->property = $property;
        $this->number = $number;
    }

    public function property(): string
    {
        return $this->property;
    }

    public function operator(): string
    {
        return 'greaterThan';
    }

    /**
     * @return string|array|bool|int
     */
    public function value()
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
