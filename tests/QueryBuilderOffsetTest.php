<?php

declare(strict_types=1);

namespace Tourware\Tests;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\Utils;
use PhpParser\Node\Expr\BinaryOp\Equal;
use Sigmie\Http\Contracts\JSONClient;
use Sigmie\Http\Contracts\JSONResponse;
use Sigmie\Http\JSONRequest;
use Tourware\Client;
use Tourware\Entities\Travel;
use Tourware\Operator\Contains;
use Tourware\Operator\Equals;
use Tourware\Operator\StartsWith;
use Tourware\Orders\Asc;
use Tourware\Orders\Desc;
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

        $this->client->travels()->query()
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

        $this->client->travels()->query()
        ->offset(100)
        ->get();
    }
}
