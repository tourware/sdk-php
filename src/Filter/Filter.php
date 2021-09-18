<?php

declare(strict_types=1);

namespace Tourware\Filter;

use Tourware\Contracts\Filter as FilterInterface;

class Filter implements FilterInterface
{
    public function __construct(
        protected string $property,
        protected string $operator,
        protected string $value
    ) {
    }

    public function property(): string
    {
        return $this->property;
    }

    public function operator(): string
    {
        return $this->operator;
    }

    public function value(): string|array|bool|int
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
