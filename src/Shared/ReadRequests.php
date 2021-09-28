<?php

declare(strict_types=1);

namespace Tourware\Shared;

use Sigmie\Http\Contracts\JSONRequest;
use Tourware\Requests\ApiRequest;

trait ReadRequests
{
    abstract protected function endpoint(): string;

    protected function showRequest(string $identifier): JSONRequest
    {
        return new ApiRequest('GET', "{$this->endpoint()}/{$identifier}");
    }

    protected function listRequest(int $offset, int $limit): JSONRequest
    {
        return new ApiRequest('GET', "{$this->endpoint()}");
    }
}
