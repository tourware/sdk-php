<?php

declare(strict_types=1);

namespace Tourware\Contracts;

use GuzzleHttp\Client as Http;

interface Entity
{
    public function endpoint(): string;

    public function client(Http $http);
}
