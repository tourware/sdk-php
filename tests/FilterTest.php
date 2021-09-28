<?php

declare(strict_types=1);

namespace Tourware\Tests;

use Tourware\Operator\Contains;
use Tourware\Operator\EndsWith;
use Tourware\Operator\Equals;
use Tourware\Operator\GreaterThan;
use Tourware\Operator\In;
use Tourware\Operator\LessThan;
use Tourware\Operator\Not;
use Tourware\Operator\StartsWith;

class FilterTest extends TestCase
{
    /**
     * @test
     */
    public function greater_than()
    {
        $filter = new GreaterThan('foo', 5);

        $this->assertEquals('foo', $filter->property());
        $this->assertEquals('greaterThan', $filter->operator());
        $this->assertEquals(5, $filter->value());

        $this->assertEquals([
            'property' => 'foo',
            'operator' => 'greaterThan',
            'value' => 5
        ], $filter->raw());
    }

    /**
     * @test
     */
    public function less_than()
    {
        $filter = new LessThan('foo', 5);

        $this->assertEquals('foo', $filter->property());
        $this->assertEquals('lessThan', $filter->operator());
        $this->assertEquals(5, $filter->value());

        $this->assertEquals([
            'property' => 'foo',
            'operator' => 'lessThan',
            'value' => 5
        ], $filter->raw());
    }

    /**
     * @test
     */
    public function equals()
    {
        $filter = new Equals('foo', 'bar');

        $this->assertEquals('foo', $filter->property());
        $this->assertEquals('equals', $filter->operator());
        $this->assertEquals('bar', $filter->value());

        $this->assertEquals([
            'property' => 'foo',
            'operator' => 'equals',
            'value' => 'bar'
        ], $filter->raw());
    }

    /**
     * @test
     */
    public function ends_with()
    {
        $filter = new EndsWith('foo', 'bar');

        $this->assertEquals('foo', $filter->property());
        $this->assertEquals('endsWith', $filter->operator());
        $this->assertEquals('bar', $filter->value());

        $this->assertEquals([
            'property' => 'foo',
            'operator' => 'endsWith',
            'value' => 'bar'
        ], $filter->raw());
    }

    /**
     * @test
     */
    public function starts_with()
    {
        $filter = new StartsWith('foo', 'bar');

        $this->assertEquals('foo', $filter->property());
        $this->assertEquals('startsWith', $filter->operator());
        $this->assertEquals('bar', $filter->value());

        $this->assertEquals([
            'property' => 'foo',
            'operator' => 'startsWith',
            'value' => 'bar'
        ], $filter->raw());
    }

    /**
     * @test
     */
    public function not()
    {
        $filter = new Not('foo', 'bar');

        $this->assertEquals('foo', $filter->property());
        $this->assertEquals('not', $filter->operator());
        $this->assertEquals('bar', $filter->value());

        $this->assertEquals([
            'property' => 'foo',
            'operator' => 'not',
            'value' => 'bar'
        ], $filter->raw());
    }

    /**
     * @test
     */
    public function in()
    {
        $filter = new In('foo', ['bar', 'baz']);

        $this->assertEquals('foo', $filter->property());
        $this->assertEquals('in', $filter->operator());
        $this->assertEquals(['bar', 'baz'], $filter->value());

        $this->assertEquals([
            'property' => 'foo',
            'operator' => 'in',
            'value' => ['bar', 'baz']
        ], $filter->raw());
    }

    /**
     * @test
     */
    public function contains()
    {
        $filter = new Contains('foo', 'bar');

        $this->assertEquals('foo', $filter->property());
        $this->assertEquals('contains', $filter->operator());
        $this->assertEquals('bar', $filter->value());

        $this->assertEquals([
            'property' => 'foo',
            'operator' => 'contains',
            'value' => 'bar'
        ], $filter->raw());
    }
}
