<?php

declare(strict_types=1);

namespace Tourware;

use Sigmie\Http\Contracts\JSONClient;
use Sigmie\Http\Contracts\JSONResponse;
use Tourware\Contracts\Entity;
use Tourware\Contracts\QueryBuilder as QueryBuilderInterface;
use Tourware\Requests\QueryRequest;
use Tourware\Shared\Filter;
use Tourware\Shared\Limit;
use Tourware\Shared\Offset;
use Tourware\Shared\Sort;

class QueryBuilder implements QueryBuilderInterface
{
    use Sort, Filter, Offset, Limit;

    public function __construct(protected JSONClient $http, protected Entity $entity)
    {
    }

    public function entity(Entity $entity)
    {
        $this->entity = $entity;

        return $this;
    }

    public function get(): JSONResponse
    {
        $request = new QueryRequest(
            entity: $this->entity,
            filters: $this->filters,
            sort: $this->sort,
            offset: $this->offset,
            limit: $this->limit
        );

        return $this->http->request($request);
    }
}
