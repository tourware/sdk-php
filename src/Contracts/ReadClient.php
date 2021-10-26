<?php

declare(strict_types=1);

namespace Tourware\Contracts;

interface ReadClient
{
    public function list(int $offset = 0, int $limit = 50): ?array;

    public function find(string $identifier): ?array;

    public function query(): QueryBuilder;
}
