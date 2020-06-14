<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Response;

trait ControllerTrait
{
    protected function toJson($message, $status = Response::HTTP_OK, array $headers = [], $disable_numeric_check = false)
    {
        return $this->toJsonResponse($message, $status, $headers, $disable_numeric_check);
    }

    protected function toJsonResponse($message, $status = Response::HTTP_OK, array $headers = [], $disable_numeric_check = false)
    {
        $options = $disable_numeric_check ? JSON_PRETTY_PRINT : JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK;

        return response()->json($message, $status, $headers, $options);
    }
}
