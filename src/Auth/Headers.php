<?php

declare(strict_types=1);

namespace Tourware\Auth;


final class Headers
{
    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function __invoke(): array
    {
        return [
            'headers' => [
                'x-api-key' => "{$this->token}",
                'Content-Type' => 'application/json'
            ]
        ];
    }
}
