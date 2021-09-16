<?php

declare(strict_types=1);

namespace Tourware;

use Sigmie\Http\Contracts\Auth;

final class Authentication implements Auth
{
    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function keys(): array
    {
        return [
            'headers' => ['x-api-key' => "{$this->token}"]
        ];
    }
}
