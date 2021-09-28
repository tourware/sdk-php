<?php declare(strict_types=1);

namespace Tourware\Contracts;


interface SortBuilder
{
    public function asc(): QueryBuilder;

    public function desc(): QueryBuilder;
}
