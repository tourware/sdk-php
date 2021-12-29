<?php

declare(strict_types=1);

namespace Tourware;

use Adbar\Dot;
use ArrayAccess;
use GuzzleHttp\Client as Http;
use GuzzleHttp\Psr7\Stream;
use Iterator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Tourware\Contracts\Entity;
use Tourware\Contracts\QueryBuilder as QueryBuilderInterface;
use Tourware\Requests\QueryRequest;
use Tourware\Shared\Filter;
use Tourware\Shared\LazyEach;
use Tourware\Shared\Limit;
use Tourware\Shared\Offset;
use Tourware\Shared\SendRequest;
use Tourware\Shared\Sort;

class QueryBuilder implements QueryBuilderInterface
{
    use Sort;
    use Filter;
    use Offset;
    use Limit;
    use SendRequest;
    use LazyEach;

    protected Http $http;

    protected Entity $entity;

    protected static ?Stream $stream = null;

    public function __construct(Http $http, Entity $entity)
    {
        $this->http = $http;
        $this->entity = $entity;
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

    public function response(): ResponseInterface
    {
        $request = $this->paginatedRequest($this->offset, $this->limit);

        return $this->http->sendRequest($request);
    }

    public function request(): RequestInterface
    {
        return $this->paginatedRequest($this->offset, $this->limit);
    }

    public function total(): int
    {
        $request = $this->paginatedRequest($this->offset, $this->limit);

        return $this->sendRequest($request)['total'];
    }

    public function get(): ArrayAccess
    {
        $res = $this->listAll($this->offset, $this->limit);

        return dot(iterator_to_array($res, false));
    }

    public function iterator(): Iterator
    {
        return $this->listAll($this->offset, $this->limit);
    }

    private function paginatedRequest(int $offset, int $limit): RequestInterface
    {
        $request = new QueryRequest(
            $this->entity,
            $this->filters,
            $this->sort,
            $offset,
            $limit
        );

        return (is_null(self::$stream)) ? $request : $request->withBody(self::$stream);
    }
}
