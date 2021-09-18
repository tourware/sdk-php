<?php

declare(strict_types=1);

namespace Tourware\Filter;

use Tourware\Contracts\FilterBuilder as FilterBuilderInterface;
use Tourware\Contracts\QueryBuilder;
use Tourware\Operator\Contains;
use Tourware\Operator\EndsWith;
use Tourware\Operator\Equals;
use Tourware\Operator\GreaterThan;
use Tourware\Operator\In;
use Tourware\Operator\LessThan;
use Tourware\Operator\Not;
use Tourware\Operator\StartsWith;
use Tourware\Query\Property;

class FilterBuilder implements FilterBuilderInterface
{
    public function __construct(
        private string $property,
        private QueryBuilder $builder
    ) {
    }

    public function equals(int|string|bool $value): QueryBuilder
    {
        $operator = new Equals($this->property, $value);

        $this->builder->addFilter($operator);

        return $this->builder;
    }

    public function lessThan(int $number): QueryBuilder
    {
        $operator = new LessThan($this->property, $number);

        $this->builder->addFilter($operator);

        return $this->builder;
    }

    public function greaterThan(int $number): QueryBuilder
    {
        $operator = new GreaterThan($this->property, $number);

        $this->builder->addFilter($operator);

        return $this->builder;
    }

    public function not(int|bool|string $value): QueryBuilder
    {
        $operator = new Not($this->property, $value);

        $this->builder->addFilter($operator);

        return $this->builder;
    }

    public function startsWith(string $text): QueryBuilder
    {
        $operator = new StartsWith($this->property, $text);

        $this->builder->addFilter($operator);

        return $this->builder;
    }

    public function endsWith(string $text): QueryBuilder
    {
        $operator = new EndsWith($this->property, $text);

        $this->builder->addFilter($operator);

        return $this->builder;
    }

    public function in(array $values): QueryBuilder
    {
        $operator = new In($this->property, $values);

        $this->builder->addFilter($operator);

        return $this->builder;
    }

    public function contains(string $text): QueryBuilder
    {
        $operator = new Contains($this->property, $text);

        $this->builder->addFilter($operator);

        return $this->builder;
    }
}
