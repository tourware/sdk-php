<?php

declare(strict_types=1);

namespace Tourware\Operator;

use Tourware\Contracts\Filter;
use Tourware\Query\Property;

class Not implements Filter
{
    protected string $property;

    /**
     * @var int|bool|string
     */
    protected $value;

    public function __construct(string $property, $value)
    {
        $this->property = $property;
        $this->value = $value;
    }

    public function property(): string
    {
        return $this->property;
    }

    public function operator(): string
    {
        return 'not';
    }

    /**
     * @return string|array|bool|int
     */
    public function value()
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
