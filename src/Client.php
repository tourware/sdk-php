<?php

declare(strict_types=1);

namespace Tourware;

use Sigmie\Http\Auth\BasicAuth;
use Sigmie\Http\Contracts\JSONClient as JSONClientInterface;
use Sigmie\Http\JSONClient;
use Tourware\Contracts\Client as ClientInterface;
use Tourware\Contracts\QueryBuilder as QueryBuilderInterface;
use Tourware\QueryBuilder;

class Client implements ClientInterface
{
    public function __construct(protected JSONClientInterface $http)
    {
        // constructor body
    }

    public static function create(string $token, bool $staging = true)
    {
        $url = $staging ? 'https://cloud-staging.typisch-touristik.de' : 'https://cloud.typisch-touristik.de';

        $client = JSONClient::create($url, new Authentication($token));

        return new static($client);
    }

    public function query(string $entity): QueryBuilderInterface
    {
        $builder = new QueryBuilder($this->http);

        $builder->entity($entity);

        return $builder;
    }
}
