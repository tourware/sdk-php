<?php

declare(strict_types=1);

namespace Tourware\Contracts;

interface Filter
{
    public function property(): string;

    public function operator(): string;

    public function value(): string|array|bool|int;

    public function raw(): array;
}
