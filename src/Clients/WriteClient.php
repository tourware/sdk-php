<?php

declare(strict_types=1);

namespace Tourware\Clients;

use GuzzleHttp\Client as Http;
use Tourware\Contracts\Entity;
use Tourware\Contracts\WriteClient as WriteClientInterface;
use Tourware\Shared\WriteRequests;

class WriteClient extends ReadClient implements WriteClientInterface
{
    use WriteRequests;

    protected Http $http;

    protected Entity $entity;

    public function create(array $values): array
    {
        $request = $this->createRequest($values);

        $json = $this->sendRequest($request);

        return (isset($json['records']) && isset($json['records'][0])) ? $json['records'][0] : [];
    }

    public function update(string $identifier, array $values): array
    {
        $request = $this->updateRequest($identifier, $values);

        $json = $this->sendRequest($request);

        return (isset($json['records']) && isset($json['records'][0])) ? $json['records'][0] : [];
    }

    public function delete(string $identifier): array
    {
        $request = $this->destroyRequest($identifier);

        $json = $this->sendRequest($request);

        return (isset($json[0])) ? $json[0] : [];
    }
}
