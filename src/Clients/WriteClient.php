<?php

declare(strict_types=1);

namespace Tourware\Clients;

use Sigmie\Http\Contracts\JSONClient;
use Tourware\Contracts\Entity;
use Tourware\Contracts\WriteClient as WriteClientInterface;
use Tourware\Contracts\QueryBuilder;
use Tourware\QueryBuilder as TourwareQueryBuilder;
use Tourware\Shared\WriteRequests;

class WriteClient extends ReadClient implements WriteClientInterface
{
    use WriteRequests;

    public function __construct(protected JSONClient $http, protected Entity $entity)
    {
    }

    protected function endpoint(): string
    {
        return $this->entity->endpoint();
    }

    public function find(string $identifier): array
    {
        $request = $this->showRequest($identifier);

        return $this->http->request($request)->json();
    }

    public function create(array $values): array
    {
        $request = $this->createRequest($values);

        return $this->http->request($request)->json();
    }

    public function update(string $identifier, array $values): array
    {
        $request = $this->updateRequest($identifier, $values);

        return $this->http->request($request)->json();
    }

    public function list(int $offset = 0, int $limit = 50): array
    {
        $request = $this->listRequest($offset, $limit);

        return $this->http->request($request)->json();
    }

    public function delete(string $identifier): array
    {
        $request = $this->destroyRequest($identifier);

        return $this->http->request($request)->json();
    }

    public function query(): QueryBuilder
    {
        return new TourwareQueryBuilder($this->http, $this->entity);
    }
}
