<?php

declare(strict_types=1);

namespace Tourware\Clients;

use Sigmie\Http\Contracts\JSONClient;
use Tourware\Contracts\Entity;
use Tourware\Contracts\QueryBuilder;
use Tourware\Shared\Requests;

abstract class BaseClient
{
    use Requests;

    public function __construct(protected JSONClient $http)
    {
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

    public function query()
    {
        return new QueryBuilder;
    }

    abstract protected function entity(): Entity;

    protected function alias(): string
    {
        return $this->entity()->alias();
    }
}
