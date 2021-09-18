<?php

namespace Tourware\Contracts;

use Tourware\Filter\FilterBuilder;

interface SortBuilder
{
    public function asc(): QueryBuilder;

    public function desc(): QueryBuilder;
}
