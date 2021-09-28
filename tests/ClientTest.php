<?php

declare(strict_types=1);

namespace Tourware\SDK;

use Sigmie\Http\Contracts\JSONClient;
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

        // dd($client->travels()->find('60feacb365f5f1002750c2b2'));
        // $client->travels()->query()->filter('id')->startsWith('blah')
        //     ->sort('id')->desc()
        //     // ->addRawFilter(['propert'=>'id','contains'=>])
        //     // ->addFilter(new Contains(''))
        //     ->addSort(new Asc('id'))
        //     ->get();

        // $res = $client->travels()->query()
        //     ->filter('id')
        //     ->equals('60feacb365f5f1002750c2b2')
        //     ->sort('name')->asc()
        //     ->sort('title')->desc()
        //     ->limit(5)
        //     ->offset(0)
        //     ->get()->json();

        // dd($res);


        // /** @var  JSONResponse $res */
        // $res = $client->query('travels')->get();

        // dd($res->json());
    }
}
