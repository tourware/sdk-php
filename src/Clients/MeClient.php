<?php

declare(strict_types=1);

namespace Tourware\Clients;

use Tourware\Entities\Custom;

class MeClient extends ReadClient
{
    public function whoami()
    {
        return (new Custom($this->http, 'me/whoami', 'get'))->call();
    }
}
