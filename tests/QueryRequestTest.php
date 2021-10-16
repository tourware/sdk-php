<?php

declare(strict_types=1);

namespace Tourware\Tests;

use Tourware\Entities\Travel;
use Tourware\Operator\EndsWith;
use Tourware\Operator\Equals;
use Tourware\Operator\StartsWith;
use Tourware\Orders\Asc;
use Tourware\Orders\Desc;
use Tourware\Requests\QueryRequest;

class QueryRequestTest extends TestCase
{
    /**
     * @test
     */
    public function query_string()
    {
        $queryRequest = new QueryRequest(
            new Travel,
            [
                (new Equals('foo', 'bar'))->raw(),
                (new StartsWith('mickey', 'mouse'))->raw(),
                (new EndsWith('nemo', 'dorry'))->raw(),
            ],
            [
                (new Asc('toy'))->raw(),
                (new Desc('story'))->raw(),
            ]
        );

        $uri = $queryRequest->getUri();

        $expected = 'filter=[{"property":"foo","operator":"equals","value":"bar"},{"property":"mickey","operator":"startsWith","value":"mouse"},{"property":"nemo","operator":"endsWith","value":"dorry"}]&sort=[{"property":"toy","direction":"asc"},{"property":"story","direction":"desc"}]&limit=100&skip=0';

        $this->assertEquals($expected, urldecode($uri->getQuery()));
    }

    /**
     * @test
     */
    public function path_and_method()
    {
        $queryRequest = new QueryRequest(
            new Travel,
        );

        $uri = $queryRequest->getUri();

        $this->assertEquals('/api/travels', $uri->getPath());
        $this->assertEquals('GET', $queryRequest->getMethod());
    }
}
