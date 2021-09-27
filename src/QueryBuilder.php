<?php

declare(strict_types=1);

namespace Tourware;

use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Utils;
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

    protected static null|Stream $stream = null;

    public function __construct(protected JSONClient $http, protected Entity $entity)
    {
    }

    public static function fakeStream(Stream $stream)
    {
        self::$stream = $stream;
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

        $request = (is_null(self::$stream)) ? $request : $request->withBody(self::$stream);

        return $this->http->request($request);
    }
}
