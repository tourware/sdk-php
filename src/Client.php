<?php

declare(strict_types=1);

namespace Tourware;

use Sigmie\Http\Contracts\JSONClient as JSONClientInterface;
use Sigmie\Http\JSONClient;
use Tourware\Auth\Authentication;
use Tourware\Contracts\Entity;
use Tourware\Contracts\ReadClient;
use Tourware\Contracts\WriteClient;
use Tourware\Entities\Raw;
use Tourware\Entities\WriteEntity;
use Tourware\Shared\Clients;

class Client
{
    use Clients;

    final public function __construct(protected JSONClientInterface $http)
    {
    }

    public static function create(string $xApiKey, bool $staging = true)
    {
        $url = $staging ? 'https://app-staging.tourware.net' : 'https://app.tourware.net';

        $client = JSONClient::create($url, new Authentication($xApiKey));

        return new static($client);
    }

    public function raw(string $endpoint): WriteClient
    {
        return (new Raw($endpoint))->client($this->http);
    }

    public function entity(Entity $entity): ReadClient|WriteEntity
    {
        return $entity->client($this->http);
    }
}
