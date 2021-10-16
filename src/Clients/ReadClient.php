<?php

declare(strict_types=1);

namespace Tourware\Clients;

use Tourware\Contracts\Entity;
use Tourware\Contracts\QueryBuilder;
use Tourware\Contracts\ReadClient as ReadClientInterface;
use Tourware\QueryBuilder as TourwareQueryBuilder;
use Tourware\Shared\ReadRequests;
    use GuzzleHttp\Client as Http;
    use Psr\Http\Message\RequestInterface;
use Tourware\Shared\SendRequest;

class ReadClient implements ReadClientInterface
{
    use ReadRequests,
        SendRequest;

    protected Http $http;

    protected Entity $entity;

    public function __construct(Http $http, Entity $entity)
    {
        $this->http = $http;
        $this->entity = $entity;
    }

    public function find(string $identifier): array
    {
        $request = $this->showRequest($identifier);

        $json = $this->sendRequest($request);

        return (isset($json['records']) && isset($json['records'][0])) ? $json['records'][0] : [];
    }

    public function list(int $offset = 0, int $limit = 50): array
    {
        $request = $this->listRequest($offset, $limit);

        $json = $this->sendRequest($request);

        return (isset($json['records'])) ? $json['records'] : [];
    }

    public function query(): QueryBuilder
    {
        return new TourwareQueryBuilder($this->http, $this->entity);
    }

    protected function endpoint(): string
    {
        return $this->entity->endpoint();
    }
}
