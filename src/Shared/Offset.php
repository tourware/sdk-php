<?php

declare(strict_types=1);

namespace Tourware\Shared;

trait Offset
{
    private int $offset = 0;

    public function offset(int $int): self
    {
        $this->offset = $int;

        return $this;
    }
}
