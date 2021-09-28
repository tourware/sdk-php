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
            limit: 200
        );

        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($queryRequest);

        $this->client->travels()->query()
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
            limit: 100
        );

        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($queryRequest);

        $this->client->travels()->query()
        ->get();
    }
}
