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

        $url = "{$entity->alias()}?";
        $url .= "filter={$filters}";
        $url .= "&sort={$sort}";
        $url .= "&limit={$limit}";
        $url .= "&skip={$offset}";

        parent::__construct('GET', $url);
    }
}
