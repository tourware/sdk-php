<?php

declare(strict_types=1);

namespace Tourware\Requests;

use GuzzleHttp\Psr7\Uri;
use Tourware\Contracts\Entity;

class QueryRequest extends ApiRequest
{
    public function __construct(
        Entity $entity,
        array $filters = [],
        array $sort = [],
        int $offset = 0,
        int $limit = 100,
    ) {
        $filters = json_encode($filters);
        $sort = json_encode($sort);

        $uri = new Uri("{$entity->endpoint()}?");
        $uri = Uri::withQueryValue($uri, 'filter', $filters);
        $uri = Uri::withQueryValue($uri, 'sort', $sort);
        $uri = Uri::withQueryValue($uri, 'limit', (string) $limit);
        $uri = Uri::withQueryValue($uri, 'skip', (string) $offset);

        parent::__construct('GET', (string) $uri);
    }
}
