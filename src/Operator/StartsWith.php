<?php

declare(strict_types=1);

namespace Tourware\Operator;

use Tourware\Contracts\Filter;
use Tourware\Query\Property;

class StartsWith implements Filter
{
    protected string $property;

    protected string $text;

    public function __construct(string $property, string $text)
    {
        $this->property = $property;
        $this->text = $text;
    }

    public function property(): string
    {
        return $this->property;
    }

    public function operator(): string
    {
        return 'startsWith';
    }

    /**
     * @return string|array|bool|int
     */
    public function value()
    {
        return $this->text;
    }

    public function raw(): array
    {
        return [
            'property' => $this->property,
            'operator' => $this->operator(),
            'value' => $this->text
        ];
    }
}
