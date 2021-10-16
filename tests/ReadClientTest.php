<?php

declare(strict_types=1);

namespace Tourware\Tests;

use Tourware\Requests\ApiRequest;

class ReadClientTest extends TestCase
{
    /**
     * @test
     */
    public function show()
    {
        $apiRequest = new ApiRequest(
            'GET',
            'foo/bar',
            ['foo' => 'bar']
        );
        $apiRequest = $apiRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('sendRequest')->with($apiRequest);

        $this->client->raw('foo')->find('bar');
    }

    /**
     * @test
     */
    public function list()
    {
        $apiRequest = new ApiRequest(
            'GET',
            'foo?limit=50&skip=0',
            ['foo' => 'bar']
        );
        $apiRequest = $apiRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('sendRequest')->with($apiRequest);

        $this->client->raw('foo')->list();
    }
}
