<?php

declare(strict_types=1);

namespace Tourware\Operator;

use Tourware\Contracts\Filter;
use Tourware\Query\Property;

class LessThan implements Filter
{
    protected string $property;

    protected string $number;

    public function __construct(string $property, string $number)
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
        return 'lessThan';
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
