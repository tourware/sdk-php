<?php

declare(strict_types=1);

namespace Tourware\Shared;

use Sigmie\Http\Contracts\JSONRequest;
use Tourware\Requests\ApiRequest;

trait Requests
{
    abstract protected function alias(): string;

    protected function showRequest(string $identifier): JSONRequest
    {
        return new ApiRequest('GET', "{$this->alias()}/{$identifier}");
    }

    protected function listRequest(int $offset, int $limit): JSONRequest
    {
        return new ApiRequest('GET', "{$this->alias()}");
    }

    protected function updateRequest(string $identifier, array $payload): JSONRequest
    {
        return new ApiRequest('PUT', "{$this->alias()}/{$identifier}", $payload);
    }

    protected function destroyRequest(string $indetifier): JSONRequest
    {
        return new ApiRequest('DELETE', "{$this->alias()}/{$indetifier}");
    }

    protected function createRequest(array $payload): JSONRequest
    {
        return new ApiRequest('POST', "{$this->alias()}", $payload);
    }
}
