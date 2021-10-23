<?php

use PHPUnit\Framework\TestCase;
use App\AreaFormulasValidation;

class AreaCalculationTest extends TestCase
{
    private static $request = array();

    public function testTriangleAreaCalculation()
    {
        self::$request = [
            'name' => 'triangle',
            'base' => 10,
            'height' => 20,
            'area' => 100
        ];

        $this->assertTrue(AreaFormulasValidation::validateArea(self::$request));

        self::$request = [
            'name' => 'triangle',
            'base' => 10,
            'height' => 20,
            'area' => 50
        ];

        $this->assertFalse(AreaFormulasValidation::validateArea(self::$request));
    }

    public function testSquareAreaCalculation()
    {
        self::$request = [
            'name' => 'square',
            'base' => 10,
            'area' => 100
        ];

        $this->assertTrue(AreaFormulasValidation::validateArea(self::$request));

        self::$request = [
            'name' => 'square',
            'base' => 10,
            'area' => 50
        ];

        $this->assertFalse(AreaFormulasValidation::validateArea(self::$request));
    }

    public function testRectangleAreaCalculation()
    {
        self::$request = [
            'name' => 'rectangle',
            'base' => 10,
            'height' => 20,
            'area' => 200
        ];

        $this->assertTrue(AreaFormulasValidation::validateArea(self::$request));

        self::$request = [
            'name' => 'rectangle',
            'base' => 10,
            'height' => 20,
            'area' => 50
        ];

        $this->assertFalse(AreaFormulasValidation::validateArea(self::$request));
    }
}
