<?php

declare(strict_types=1);

namespace Tourware\Shared;

use Sigmie\Http\Contracts\JSONRequest;
use Tourware\Query\Property;
use Tourware\Contracts\QueryBuilder;
use Tourware\Contracts\Sort as SortInterface;
use Tourware\Requests\ApiRequest;
use Tourware\Sort\Order;
use Tourware\Sort\SortBuilder;
use Tourware\Contracts\SortBuilder as SortBuilderInterface;

trait Sort
{
    private array $sort = [];

    public function sort(string $property): SortBuilderInterface
    {
        return new SortBuilder($property, $this);
    }

    public function addSort(SortInterface $sort): static
    {
        $this->sort[] = $sort->raw();

        return $this;
    }

    public function addRawSort(array $sort): static
    {
        $this->sort[] = $sort;

        return $this;
    }
}
