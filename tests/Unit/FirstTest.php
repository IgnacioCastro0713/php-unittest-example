<?php

namespace Test\Unit;

use App\Calculator;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    function testSum()
    {
        $calculator = new Calculator();

        // asserts
        $this->assertEquals(5, $calculator->sum(2, 3));

        $this->assertInstanceOf(Calculator::class, $calculator);
    }

    public function testAsserts()
    {
        self::assertTrue(true);

        $this->assertClassHasAttribute('data', Calculator::class);

        $this->assertContains(1, [1, 2, 3, 4]);
    }
}
