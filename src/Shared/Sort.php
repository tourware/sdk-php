<?php

declare(strict_types=1);

namespace Tourware\Shared;

use Tourware\Contracts\Sort as SortInterface;
use Tourware\Contracts\SortBuilder as SortBuilderInterface;
use Tourware\Sort\SortBuilder;

trait Sort
{
    private array $sort = [];

    public function sort(string $property): SortBuilderInterface
    {
        return new SortBuilder($property, $this);
    }

    public function addSort(SortInterface $sort): self
    {
        $this->sort[] = $sort->raw();

        return $this;
    }

    public function addRawSort(array $sort): self
    {
        $this->sort[] = $sort;

        return $this;
    }
}
