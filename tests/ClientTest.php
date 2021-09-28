<?php

declare(strict_types=1);

namespace Tourware\SDK;

use Sigmie\Http\Contracts\JSONResponse;
use Tourware\Client;
use Tourware\Entities\Travel;
use Tourware\Operator\Contains;
use Tourware\Orders\Asc;
use Tourware\Requests\ApiRequest;
use Tourware\Tests\TestCase;

class ClientTest extends TestCase 
{
    /**
     * Test that true does in fact equal true
     */
    public function testTrueIsTrue()
    {
        $client = Client::create(xApiKey: '1f936aef-3f5d-4ec4-8244-bba0b42e4699');

        // $client->travel()->list();

        // $client->entity(new Travel)->list();

        // $client->raw('travels')->list();
    }

    /**
    * @test
    */
    public function travels()
    {
        $apiRequest = new ApiRequest(
            'POST',
            'travels',
            ['foo' => 'bar']
        );
        $apiRequest = $apiRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($apiRequest);

        $this->client->travel()->create(['foo' => 'bar']);
    }

    /**
     * @test
     */
    public function raw()
    {
        $apiRequest = new ApiRequest(
            'POST',
            'foo',
            ['foo' => 'bar']
        );
        $apiRequest = $apiRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($apiRequest);

        $this->client->raw('foo')->create(['foo' => 'bar']);
    }

    /**
     * @test
     */
    public function entity()
    {
        $entity = new Travel;
        $apiRequest = new ApiRequest(
            'POST',
            $entity->endpoint(),
            ['foo' => 'bar']
        );
        $apiRequest = $apiRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($apiRequest);

        $this->client->entity($entity)->create(['foo' => 'bar']);
    }
}
