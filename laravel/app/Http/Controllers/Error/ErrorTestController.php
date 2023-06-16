<?php

namespace App\Http\Controllers\Error;
use Illuminate\Routing\Controller as BaseController;

class ErrorTestController extends BaseController
{
    public function errorHandler(): string
    {
        return "Error!!!!!!!!!!";
    }
}
