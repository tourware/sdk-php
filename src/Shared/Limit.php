<?php

declare(strict_types=1);

namespace Tourware\Shared;


trait Limit
{
    private int $limit = 100;

    public function limit(int $int): static
    {
        $this->limit = $int;

        return $this;
    }
}
