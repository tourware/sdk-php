<?php

declare(strict_types=1);

namespace Tourware\Sort;

use Tourware\Contracts\QueryBuilder;
use Tourware\Contracts\SortBuilder as SortBuilderInterface;
use Tourware\Orders\Asc;
use Tourware\Orders\Desc;

class SortBuilder implements SortBuilderInterface
{
    protected string $property;

    protected QueryBuilder $builder;

    public function __construct(
        string $property,
        QueryBuilder $builder
    ) {
        $this->property = $property;
        $this->builder = $builder;
    }

    public function asc(): QueryBuilder
    {
        $this->builder->addSort(new Asc($this->property));

        return $this->builder;
    }

    public function desc(): QueryBuilder
    {
        $this->builder->addSort(new Desc($this->property));

        return $this->builder;
    }
}
