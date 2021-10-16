<?php

declare(strict_types=1);

namespace Tourware\Tests;

use Tourware\Entities\Travel;
use Tourware\Requests\QueryRequest;

class QueryBuilderLimitTest extends TestCase
{
    /**
     * @test
     */
    public function custom_limit()
    {
        $queryRequest = new QueryRequest(
            new Travel,
            [],
            [],
            0,
            200
        );

        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('sendRequest')->with($queryRequest);

        $this->client->travel()->query()
            ->limit(200)
            ->get();
    }
    /**
     * @test
     */
    public function default_limit()
    {
        $queryRequest = new QueryRequest(
            new Travel,
            [],
            [],
            0,
        );

        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('sendRequest')->with($queryRequest);

        $this->client->travel()->query()
            ->get();
    }
}
