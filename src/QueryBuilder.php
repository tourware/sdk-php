<?php

declare(strict_types=1);

namespace Tourware;

use GuzzleHttp\Psr7\Uri;
use Sigmie\Http\Contracts\JSONClient;
use Sigmie\Http\JSONRequest;
use Tourware\Contracts\QueryBuilder as QueryBuilderInterface;

class QueryBuilder implements QueryBuilderInterface
{
    private string $entity;

    public function __construct(protected JSONClient $http)
    {
    }

    public function entity(string $entity): static
    {
        $this->entity = $entity;

        return $this;
    }

    public function get()
    {
        return $this->http->request(new JSONRequest('GET', new Uri($this->entity)));
    }
}
