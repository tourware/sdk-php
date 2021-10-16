<?php

declare(strict_types=1);

namespace Tourware\Operator;

use Tourware\Contracts\Filter;
use Tourware\Query\Property;

class In implements Filter
{
    protected string $property;

    protected array $values;

    public function __construct(string $property, array $values)
    {
        $this->property = $property;
        $this->values = $values;
    }

    public function property(): string
    {
        return $this->property;
    }

    public function operator(): string
    {
        return 'in';
    }

    /**
     * @return string|array|bool|int
     */
    public function value()
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
