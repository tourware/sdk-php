<?php

declare(strict_types=1);

namespace Tourware\Tests;

use Tourware\Orders\Asc;
use Tourware\Orders\Desc;

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
