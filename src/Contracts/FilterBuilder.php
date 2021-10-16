<?php

declare(strict_types=1);

namespace Tourware\Contracts;

interface FilterBuilder
{
    public function equals($value): QueryBuilder;

    public function lessThan($number): QueryBuilder;

    public function greaterThan($number): QueryBuilder;

    public function not($value): QueryBuilder;

    public function contains(string $text): QueryBuilder;

    public function startsWith(string $text): QueryBuilder;

    public function endsWith(string $text): QueryBuilder;

    public function in(array $values): QueryBuilder;
}
