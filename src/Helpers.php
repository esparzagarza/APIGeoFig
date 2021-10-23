<?php

namespace App;

class Helpers
{
    public static function permittedFigures(): array
    {
        return array('triangle', 'square', 'rectangle');
    }

    public static function permittedLiterals(): array
    {
        return array('base', 'height', 'area');
    }

    public static function isPermittedValue(string $value, array $permitted): bool
    {
        return in_array($value, $permitted) ? true : false;
    }

    public static function numericValid($value): bool
    {
        return is_numeric($value) ? true :  false;
    }

    public static function greaterThanCero($value): bool
    {
        return is_numeric($value) && $value > 0 ? true :  false;
    }

    public static function createFigure(string $name): object
    {
        return new Figure($name);
    }

    public static function cleanVar($value)
    {
        return strip_tags(trim($value));
    }

    public static function formatResponse(int $httpStatusCode, bool $success, string $message, object $figure = null): array    
    {        
        if (isset($figure)) $figure = json_decode($figure->jsonSerialize());
        return [
            'httpStatusCode' => $httpStatusCode,
            'success' => $success,
            'message' => $message,
            'data' => $figure
        ];
    }

    public static function returnToAction(array $response): void
    {
        http_response_code($response['httpStatusCode']);

        echo json_encode($response);
    }
}
