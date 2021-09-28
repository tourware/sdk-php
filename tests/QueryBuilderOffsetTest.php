<?php

declare(strict_types=1);

namespace Tourware\Tests;

use Tourware\Entities\Travel;
use Tourware\Requests\QueryRequest;

class QueryBuilderOffsetTest extends TestCase
{
    /**
     * @test
     */
    public function default_offset()
    {
        $queryRequest = new QueryRequest(
            new Travel,
            offset: 0
        );

        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($queryRequest);

        $this->client->travel()->query()
        ->get();
    }
    /**
     * @test
     */
    public function custom_limit()
    {
        $queryRequest = new QueryRequest(
            new Travel,
            offset: 100
        );

        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($queryRequest);

        $this->client->travel()->query()
        ->offset(100)
        ->get();
    }
}
