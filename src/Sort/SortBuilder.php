<?php

declare(strict_types=1);

namespace Tourware\Sort;

use Tourware\Contracts\QueryBuilder;
use Tourware\Contracts\SortBuilder as SortBulderInterface;
use Tourware\Orders\Asc;
use Tourware\Orders\Desc;

class SortBuilder implements SortBulderInterface
{
    public function __construct(
        private string $property,
        private QueryBuilder $builder
    ) {
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
