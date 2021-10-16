<?php

declare(strict_types=1);

namespace Tourware\Contracts;

interface Filter
{
    public function property(): string;

    public function operator(): string;

    /**
     * @return string|array|bool|int
     */
    public function value();

    public function raw(): array;
}
