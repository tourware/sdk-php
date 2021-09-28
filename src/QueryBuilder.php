<?php

declare(strict_types=1);

namespace Tourware;

use GuzzleHttp\Psr7\Stream;
use Sigmie\Http\Contracts\JSONClient;
use Sigmie\Http\Contracts\JSONRequest;
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

    public function response(): JSONResponse
    {
        $request = $this->createRequest();

        return $this->http->request($request);
    }

    public function request(): JSONRequest
    {
        return $this->createRequest();
    }

    public function total(): int
    {
        $request = $this->createRequest();

        return $this->http->request($request)->json('total');
    }

    public function get(): array
    {
        $request = $this->createRequest();

        return $this->http->request($request)->json();
    }

    private function createRequest(): QueryRequest
    {
        $request = new QueryRequest(
            entity: $this->entity,
            filters: $this->filters,
            sort: $this->sort,
            offset: $this->offset,
            limit: $this->limit
        );

        return (is_null(self::$stream)) ? $request : $request->withBody(self::$stream);
    }
}
