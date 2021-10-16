<?php

declare(strict_types=1);

namespace Tourware\Operator;

use Tourware\Contracts\Filter;

class Equals implements Filter
{
    protected string $property;

    /**
     * @var int|string|bool
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
        return 'equals';
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
