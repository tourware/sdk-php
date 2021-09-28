<?php

declare(strict_types=1);

namespace Tourware\Shared;

use Sigmie\Http\Contracts\JSONRequest;
use Tourware\Requests\ApiRequest;

trait WriteRequests
{
    abstract protected function endpoint(): string;

    protected function updateRequest(string $identifier, array $payload): JSONRequest
    {
        return new ApiRequest('PUT', "{$this->endpoint()}/{$identifier}", $payload);
    }

    protected function destroyRequest(string $indetifier): JSONRequest
    {
        return new ApiRequest('DELETE', "{$this->endpoint()}/{$indetifier}");
    }

    protected function createRequest(array $payload): JSONRequest
    {
        return new ApiRequest('POST', "{$this->endpoint()}", $payload);
    }
}
