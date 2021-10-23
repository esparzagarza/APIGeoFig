<?php

namespace App;

// Cors
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Classes
require __DIR__ . '/vendor/autoload.php';

use App\Helpers;
use App\AreaFormulasCalculation;

// Request
$jsondata = file_get_contents("php://input");
$request = json_decode($jsondata, TRUE);

// Vars
$succes = true;
$httpStatusCode = 200;
$response = array();

// HTTP Method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (Helpers::isPermittedValue(Helpers::cleanVar($request['name']), Helpers::permittedFigures())) {

        $figure = Helpers::createFigure($request['name']);

        unset($request['name']);

        foreach ($request as $key => $value) {

            $value = Helpers::cleanVar($value);

            if (Helpers::isPermittedValue($key, Helpers::permittedLiterals())) {

                if (Helpers::numericValid($value)) $figure->set($key, floatval($value));

                else {
                    $response = Helpers::formatResponse($httpStatusCode, $succes, "[$key, $value] Valor de literal no válido", $figure);
                    $succes = false;
                    break;
                }
            } else $response = Helpers::formatResponse($httpStatusCode, $succes, 'Nombre de Literal no válido', $figure);
        }

        if ($succes) {

            $figure->set('area', AreaFormulasCalculation::{$figure->get('name')}($figure));
            $response = Helpers::formatResponse($httpStatusCode, $succes, 'proceso completo', $figure);
        }
    } else $response = Helpers::formatResponse($httpStatusCode, $succes, "Nombre de Figura no válido", $figure);
} else $response = Helpers::formatResponse($httpStatusCode, $succes, "Verbo no válido", null);

// Exit
if (isset($figure)) unset($figure);
Helpers::returnToAction($response);
exit;
