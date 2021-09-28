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
use Tourware\Operator\EndsWith;
use Tourware\Operator\Equals;
use Tourware\Operator\StartsWith;
use Tourware\Orders\Asc;
use Tourware\Orders\Desc;
use Tourware\Requests\QueryRequest;

class SortTest extends TestCase
{
    /**
     * @test
     */
    public function asc()
    {
        $sort = new Asc('foo');

        $this->assertEquals('asc', $sort->direction());
        $this->assertEquals('foo', $sort->property());
        $this->assertEquals(['property' => 'foo', 'direction' => 'asc'], $sort->raw());
    }

    /**
     * @test
     */
    public function desc()
    {
        $sort = new Desc('foo');

        $this->assertEquals('desc', $sort->direction());
        $this->assertEquals('foo', $sort->property());
        $this->assertEquals(['property' => 'foo', 'direction' => 'desc'], $sort->raw());
    }
}
