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

        $uri = new Uri($entity->alias());
        $uri = Uri::withQueryValues($uri, ['filter' => json_encode($filters)]);
        $uri = Uri::withQueryValues($uri, ['sort' => json_encode($sort)]);
        $uri = Uri::withQueryValues($uri, ['skip' => $offset]);
        $uri = Uri::withQueryValues($uri, ['limit' => $limit]);

        dump($uri->__toString());

        parent::__construct('GET', $uri->__toString());
    }
}
