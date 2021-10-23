<?php

use PHPUnit\Framework\TestCase;
use App\Helpers;

class BasicInputsTest extends TestCase
{
    public function testPermittedFigures()
    {
        $this->assertTrue(Helpers::isPermittedValue('triangle', Helpers::permittedFigures()));
        $this->assertTrue(Helpers::isPermittedValue('square', Helpers::permittedFigures()));
        $this->assertTrue(Helpers::isPermittedValue('rectangle', Helpers::permittedFigures()));

        $this->assertFalse(Helpers::isPermittedValue('dodecahedron', Helpers::permittedFigures()));
    }

    public function testNumericInputs()
    {
        $this->assertTrue(Helpers::numericValid(0));
        $this->assertTrue(Helpers::numericValid(10));
        $this->assertTrue(Helpers::numericValid(10.321));
        $this->assertTrue(Helpers::numericValid('10.321'));
        $this->assertTrue(Helpers::numericValid(-1));
        $this->assertTrue(Helpers::numericValid('-1'));

        $this->assertFalse(Helpers::numericValid('Diez'));
    }

    public function testNumericGreaterThanCero()
    {
        $this->assertTrue(Helpers::greaterThanCero(10));
        $this->assertTrue(Helpers::greaterThanCero(10.321));
        $this->assertTrue(Helpers::greaterThanCero('10.321'));

        $this->assertFalse(Helpers::greaterThanCero(-1));
        $this->assertFalse(Helpers::greaterThanCero('-1'));
        $this->assertFalse(Helpers::greaterThanCero('Diez'));
        $this->assertFalse(Helpers::greaterThanCero(0));
    }
}
