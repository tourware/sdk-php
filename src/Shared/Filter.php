<?php

declare(strict_types=1);

namespace Tourware\Shared;

use Tourware\Contracts\Filter as FilterInterface;
use Tourware\Contracts\FilterBuilder as FilterBuilderInterface;
use Tourware\Filter\FilterBuilder;

trait Filter
{
    private array $filters = [];

    public function filter(string $property): FilterBuilderInterface
    {
        return new FilterBuilder($property, $this);
    }

    public function addFilter(FilterInterface $filter): static
    {
        $this->filters[] = $filter->raw();

        return $this;
    }

    public function addRawFilter(array $filter): static
    {
        $this->filters[] = $filter;

        return $this;
    }
}
