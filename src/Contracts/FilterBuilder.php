<?php declare(strict_types=1);

namespace Tourware\Contracts;


interface FilterBuilder
{
    public function equals(int|string|bool $value): QueryBuilder;

    public function lessThan(int $number): QueryBuilder;

    public function greaterThan(int $number): QueryBuilder;

    public function not(int|bool|string $value): QueryBuilder;

    public function contains(string $text): QueryBuilder;

    public function startsWith(string $text): QueryBuilder;

    public function endsWith(string $text): QueryBuilder;

    public function in(array $values): QueryBuilder;
}
