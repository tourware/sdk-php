<?php

declare(strict_types=1);

namespace Tourware\Contracts;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface QueryBuilder
{
    /**
     * @return static
     */
    public function addFilter(Filter $filter);

    /**
     * @return static
     */
    public function addRawFilter(array $filter);

    /**
     * @return static
     */
    public function addSort(Sort $sort);

    /**
     * @return static
     */
    public function addRawSort(array $sort);

    public function sort(string $property): SortBuilder;

    public function filter(string $property): FilterBuilder;

    /**
     * @return static
     */
    public function offset(int $offset);

    /**
     * @return static
     */
    public function limit(int $limit);

    public function request(): RequestInterface;

    public function response(): ResponseInterface;

    public function total(): int;

    public function get(): array;
}
