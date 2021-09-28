<?php

declare(strict_types=1);

namespace Tourware\Contracts;

use Sigmie\Http\Contracts\JSONClient;

interface Entity
{
    public function endpoint(): string;

    public function client(JSONClient $http);
}
