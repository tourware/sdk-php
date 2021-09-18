<?php

declare(strict_types=1);

namespace Tourware\Shared;

use Sigmie\Http\Contracts\JSONRequest;
use Tourware\Contracts\Filter as FilterInterface;
use Tourware\Filter\Operator;
use Tourware\Query\Property;
use Tourware\Contracts\QueryBuilder;
use Tourware\Requests\ApiRequest;

trait Limit
{
    private int $limit = 0;

    public function limit(int $int): static
    {
        $this->limit = $int;

        return $this;
    }
}
