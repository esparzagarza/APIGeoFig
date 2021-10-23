<?php

namespace App;

use App\AreaFormulasCalculation;

class AreaFormulasValidation extends Helpers
{
    public static function validateArea(array $request)
    {
        $figure = Helpers::createFigure($request['name']);

        foreach ($request as $key => $value) {

            $value = Helpers::cleanVar($value);

            $figure->set($key, $value);
        }

        $formula = AreaFormulasCalculation::{$figure->get('name')}($figure);

        return $figure->get('area') == $formula ? true : false;
    }
}
