<?php


use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    // some basic test
    // name must be very self-described
    public function testTrueAssertsToTrue()
    {
        // assertTrue is build in method
        $this->assertTrue(true);
    }
}
