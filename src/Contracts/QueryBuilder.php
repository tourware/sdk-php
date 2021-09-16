<?php

namespace Tourware\Contracts;

interface QueryBuilder
{
    public function entity(string $entity): static;

    public function get();
}
