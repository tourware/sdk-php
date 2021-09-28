<?php

declare(strict_types=1);

namespace Tourware\Clients;

use Sigmie\Http\Contracts\JSONClient;
use Tourware\Contracts\Entity;
use Tourware\Contracts\WriteClient;
use Tourware\Contracts\QueryBuilder;
use Tourware\Contracts\ReadClient as ReadClientInterface;
use Tourware\QueryBuilder as TourwareQueryBuilder;
use Tourware\Shared\ReadRequests;
use Tourware\Shared\WriteRequests;

class ReadClient implements ReadClientInterface
{
    use ReadRequests;

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

    public function list(int $offset = 0, int $limit = 50): array
    {
        $request = $this->listRequest($offset, $limit);

        return $this->http->request($request)->json();
    }

    public function query(): QueryBuilder
    {
        return new TourwareQueryBuilder($this->http, $this->entity);
    }
}
