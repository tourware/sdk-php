<?php

declare(strict_types=1);

namespace Tourware\Contracts;

interface Sort
{
    public function property(): string;

    public function direction(): string;

    public function raw(): array;
}
