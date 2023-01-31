<?php

declare(strict_types=1);

namespace Tourware;

use Adbar\Dot;
use GuzzleHttp\Client as Http;
use Tourware\Auth\Headers;
use Tourware\Contracts\Entity;
use Tourware\Contracts\ReadClient;
use Tourware\Contracts\WriteClient;
use Tourware\Entities\Custom;
use Tourware\Entities\Raw;
use Tourware\Shared\Clients;

class Client
{
    use Clients;

    protected Http $http;

    public function __construct(Http $http)
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

    public function custom(string $endpoint, string $method, ?array $body = null, $headers = [], $options = []): Custom
    {
        return new Custom($this->http, $endpoint, $method, $body, $headers, $options);
    }

    public function raw(string $endpoint): WriteClient
    {
        return (new Raw($endpoint))->client($this->http);
    }

    public function entity(Entity $entity): ReadClient
    {
        return $entity->client($this->http);
    }

    public function upload($filename, $content)
    {
        return $this->custom('/files/upload', 'post')->setOptions([
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => $content,
                    'filename' => $filename
                ],
            ]
        ])->call()->get('records.0');
    }

    public function whoami(): Dot
    {
        return $this->custom('/me/whoami', 'get')->call();
    }
}
