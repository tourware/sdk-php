<?php

declare(strict_types=1);

namespace Tourware\Tests;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\Utils;
use Sigmie\Http\Contracts\JSONClient;
use Sigmie\Http\Contracts\JSONResponse;
use Sigmie\Http\JSONRequest;
use Tourware\Client;
use Tourware\Entities\Travel;
use Tourware\Operator\Contains;
use Tourware\Orders\Asc;
use Tourware\Orders\Desc;
use Tourware\Requests\QueryRequest;

class QueryBuilderSortTest extends TestCase
{

    /**
     * @test
     */
    public function sort_are_passed_request()
    {
        $sort = (new Asc('foo'))->raw();

        $queryRequest = new QueryRequest(
            new Travel,
            [],
            [$sort],
        );
        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($queryRequest);

        $this->client->travels()->query()->sort('foo')->asc()->get();
    }


    /**
     * @test
     */
    public function sort_are_passed_request_in_correct_order()
    {
        $asc = (new Asc('foo'))->raw();
        $desc = (new Desc('bar'))->raw();

        $queryRequest = new QueryRequest(
            new Travel,
            [],
            [
                $asc,
                $desc
            ],
        );
        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($queryRequest);

        $this->client->travels()->query()
            ->sort('foo')->asc()
            ->sort('bar')->desc()
            ->get();
    }

    /**
     * @test
     */
    public function raw_sort_is_passed_to_request()
    {
        $rawSort = ['property' => 'foo', 'direction' => 'asc'];

        $queryRequest = new QueryRequest(
            new Travel,
            [],
            [$rawSort],
        );
        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($queryRequest);

        $this->client->travels()->query()
            ->addRawSort($rawSort)
            ->get();
    }

    /**
     * @test
     */
    public function custom_sort_is_passed_to_request()
    {
        $sort = new Desc('foo');

        $queryRequest = new QueryRequest(
            new Travel,
            [],
            [['property' => 'foo', 'direction' => 'desc']],
        );
        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($queryRequest);

        $this->client->travels()->query()
            ->addSort($sort)
            ->get();
    }
}
