<?php

namespace Tourware\Contracts;

use Sigmie\Http\Contracts\JSONResponse;
use Tourware\Contracts\SortBuilder;

interface QueryBuilder
{
    public function addFilter(Filter $filter): static;

    public function addRawFilter(array $filter): static;

    public function addSort(Sort $sort): static;

    public function addRawSort(array $sort): static;

    public function sort(string $property): SortBuilder;

    public function filter(string $property): FilterBuilder;

    public function offset(int $offset): static;

    public function limit(int $limit): static;

    public function get(): JSONResponse;
}
