<?php

declare(strict_types=1);

namespace Tourware\Tests;

use Tourware\Entities\Travel;
use Tourware\Operator\EndsWith;
use Tourware\Operator\Equals;
use Tourware\Operator\StartsWith;
use Tourware\Orders\Asc;
use Tourware\Orders\Desc;
use Tourware\Requests\ApiRequest;
use Tourware\Requests\QueryRequest;

class ApiRequestTest extends TestCase
{
    /**
     * @test
     */
    public function path()
    {
        $request = new ApiRequest('GET', 'bar');

        $uri = $request->getUri();

        $this->assertEquals('/api/bar', $uri->getPath());
        $this->assertEquals('GET', $request->getMethod());
    }
}
