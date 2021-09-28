<?php

declare(strict_types=1);

namespace Tourware\Tests;

use Tourware\Entities\Travel;
use Tourware\Operator\Equals;
use Tourware\Operator\StartsWith;
use Tourware\Requests\QueryRequest;

class QueryBuilderFilterTest extends TestCase
{

    /**
     * @test
     */
    public function filters_are_passed_request()
    {
        $filter = (new Equals('foo', 'bar'))->raw();

        $queryRequest = new QueryRequest(
            new Travel,
            [$filter],
            [],
        );
        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($queryRequest);

        $this->client->travels()->query()->filter('foo')->equals('bar')->get();
    }


    /**
     * @test
     */
    public function filters_are_passed_request_in_correct_order()
    {
        $equals = (new Equals('foo', 'bar'))->raw();
        $startsWith = (new StartsWith('baz', 'foo'))->raw();

        $queryRequest = new QueryRequest(
            new Travel,
            filters: [
                $equals,
                $startsWith
            ],
            sort: [],
        );
        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($queryRequest);

        $this->client->travels()->query()
            ->filter('foo')->equals('bar')
            ->filter('baz')->startsWith('foo')
            ->get();
    }

    /**
     * @test
     */
    public function raw_filter_is_passed_to_request()
    {
        $equals = new Equals('foo', 'bar');

        $queryRequest = new QueryRequest(
            new Travel,
            filters: [
                ['property' => 'foo', 'operator' => 'equals', 'value' => 'bar']
            ],
            sort: [],
        );
        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($queryRequest);

        $this->client->travels()->query()
            ->addFilter($equals)
            ->get();
    }

    /**
     * @test
     */
    public function custom_filter_is_passed_to_request()
    {
        $equals = ['property' => 'foo', 'operator' => 'equals', 'value' => 'bar'];

        $queryRequest = new QueryRequest(
            new Travel,
            filters: [
                ['property' => 'foo', 'operator' => 'equals', 'value' => 'bar']
            ],
            sort: [],
        );
        $queryRequest = $queryRequest->withBody($this->fakeStream);

        $this->httpMock->expects($this->once())->method('request')->with($queryRequest);

        $this->client->travels()->query()
            ->addRawFilter($equals)
            ->get();
    }
}
