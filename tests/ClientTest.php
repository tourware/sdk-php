<?php

declare(strict_types=1);

namespace Tourware\SDK;

use Tourware\Entities\Travel;
use Tourware\Requests\ApiRequest;
use Tourware\Tests\TestCase;

class ClientTest extends TestCase
{
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
