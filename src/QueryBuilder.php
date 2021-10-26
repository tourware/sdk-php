<?php

declare(strict_types=1);

namespace Tourware;

use ArrayAccess;
use GuzzleHttp\Psr7\Stream;
use Tourware\Contracts\Entity;
use Tourware\Contracts\QueryBuilder as QueryBuilderInterface;
use Tourware\Requests\QueryRequest;
use Tourware\Shared\Filter;
use Tourware\Shared\Limit;
use Tourware\Shared\Offset;
use Tourware\Shared\Sort;
use GuzzleHttp\Client as Http;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Tourware\Shared\SendRequest;

class QueryBuilder implements QueryBuilderInterface
{
    use Sort;
    use Filter;
    use Offset;
    use Limit;
    use SendRequest;

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
        $request = $this->createRequest();

        return $this->http->sendRequest($request);
    }

    public function request(): RequestInterface
    {
        return $this->createRequest();
    }

    public function total(): int
    {
        $request = $this->createRequest();

        return $this->sendRequest($request)['total'];
    }

    public function get(): ArrayAccess
    {
        $request = $this->createRequest();

        return $this->sendRequest($request);
    }

    private function createRequest(): QueryRequest
    {
        $request = new QueryRequest(
            $this->entity,
            $this->filters,
            $this->sort,
            $this->offset,
            $this->limit
        );

        return (is_null(self::$stream)) ? $request : $request->withBody(self::$stream);
    }
}
