<?php

declare(strict_types=1);

namespace Tourware\Shared;

use Sigmie\Http\Contracts\JSONRequest;
use Tourware\Contracts\Filter as FilterInterface;
use Tourware\Filter\FilterBuilder;
use Tourware\Query\Property;
use Tourware\Contracts\QueryBuilder;
use Tourware\Requests\ApiRequest;

trait Offset
{
    private int $offset = 0;

    public function offset(int $int): static
    {
        $this->offset = $int;

        return $this;
    }
}
