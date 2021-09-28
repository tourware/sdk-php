<?php

declare(strict_types=1);

namespace Tourware;

use Sigmie\Http\Contracts\JSONClient as JSONClientInterface;
use Sigmie\Http\JSONClient;
use Tourware\Auth\Authentication;
use Tourware\Clients\AccomondationsClient;
use Tourware\Clients\TravelClient;
use Tourware\Entities\Accomondation;

class Client
{
    final public function __construct(protected JSONClientInterface $http)
    {
    }

    public static function create(string $xApiKey, bool $staging = true)
    {
        $url = $staging ? 'https://app-staging.tourware.net' : 'https://app.tourware.net';

        $client = JSONClient::create($url, new Authentication($xApiKey));

        return new static($client);
    }

    public function travels(): TravelClient
    {
        return new TravelClient($this->http);
    }

    public function accomondations(): AccomondationsClient
    {
        return new AccomondationsClient($this->http);
    }
}
