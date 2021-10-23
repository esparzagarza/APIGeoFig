<?php

namespace App;

class AreaFormulasCalculation
{
    public static function triangle(Figure $figure)
    {       
        return $figure->get('base') * $figure->get('height') / 2;
    }

    public static function square(Figure $figure)
    {
        return pow($figure->get('base'), 2);
    }

    public static function rectangle(Figure $figure)
    {
        return  $figure->get('base') *  $figure->get('height');
    }
}
