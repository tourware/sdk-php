<?php

declare(strict_types=1);

namespace Tourware;

use GuzzleHttp\Client as Http;
use Tourware\Auth\Headers;
use Tourware\Contracts\Entity;
use Tourware\Contracts\ReadClient;
use Tourware\Contracts\WriteClient;
use Tourware\Entities\Raw;
use Tourware\Entities\WriteEntity;
use Tourware\Shared\Clients;

class Client
{
    use Clients;

    protected Http $http;

    final public function __construct(Http $http)
    {
        $this->http = $http;
    }

    public static function create(string $xApiKey, bool $staging = true)
    {
        $url = $staging ? 'https://app-staging.tourware.net' : 'https://app.tourware.net';

        $auth = new Headers($xApiKey);
        $config = [
            'base_uri' => $url,
            'allow_redirects' => false,
            'http_errors' => false,
            'connect_timeout' => 1
        ];

        $config = array_merge($config, $auth());

        return new static(new Http($config));
    }

    public function raw(string $endpoint): WriteClient
    {
        return (new Raw($endpoint))->client($this->http);
    }

    public function entity(Entity $entity): ReadClient
    {
        return $entity->client($this->http);
    }
}
