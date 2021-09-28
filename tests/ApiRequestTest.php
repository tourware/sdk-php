<?php

declare(strict_types=1);

namespace Tourware\Tests;

use Tourware\Requests\ApiRequest;

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
