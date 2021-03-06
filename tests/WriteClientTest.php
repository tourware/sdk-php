<?php

declare(strict_types=1);

namespace Tourware\Tests;

use Tourware\Requests\ApiRequest;

class WriteClientTest extends TestCase
{
    /**
     * @test
     */
    public function delete()
    {
        $apiRequest = new ApiRequest(
            'DELETE',
            'foo/bar',
            ['foo' => 'bar']
        );
        $apiRequest = $apiRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('sendRequest')->with($apiRequest);

        $this->client->raw('foo')->delete('bar', ['foo' => 'bar']);
    }

    /**
     * @test
     */
    public function update()
    {
        $apiRequest = new ApiRequest(
            'PUT',
            'foo/bar',
            ['foo' => 'bar']
        );
        $apiRequest = $apiRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('sendRequest')->with($apiRequest);

        $this->client->raw('foo')->update('bar', ['foo' => 'bar']);
    }

    /**
     * @test
     */
    public function create()
    {
        $apiRequest = new ApiRequest(
            'POST',
            'foo',
            ['foo' => 'bar']
        );
        $apiRequest = $apiRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('sendRequest')->with($apiRequest);

        $this->client->raw('foo')->create(['foo' => 'bar']);
    }
}
