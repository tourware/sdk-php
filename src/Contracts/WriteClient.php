<?php

declare(strict_types=1);

namespace Tourware\Contracts;

interface WriteClient extends ReadClient
{
    public function delete(string $identifier): array;

    public function update(string $identifier, array $values): array;

    public function create(array $values): array;
}
