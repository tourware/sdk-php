<?php

declare(strict_types=1);

namespace Tourware\Filter;

use Tourware\Contracts\Filter as FilterInterface;

class Filter implements FilterInterface
{
    protected string $property;

    protected string $operator;

    protected string $value;

    public function __construct(
        string $property,
        string $operator,
        string $value
    ) {
        $this->property = $property;
        $this->operator = $operator;
        $this->value = $value;
    }

    public function property(): string
    {
        return $this->property;
    }

    public function operator(): string
    {
        return $this->operator;
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
            'operator' => $this->operator,
            'value' => $this->value
        ];
    }
}
