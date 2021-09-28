<?php

declare(strict_types=1);

namespace Tourware\SDK;

use Sigmie\Http\Contracts\JSONResponse;
use Tourware\Client;
use Tourware\Operator\Contains;
use Tourware\Orders\Asc;

class ClientTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test that true does in fact equal true
     */
    public function testTrueIsTrue()
    {
        $client = Client::create(xApiKey: '1f936aef-3f5d-4ec4-8244-bba0b42e4699');
    }
}
