<?php

namespace App\Http\Controllers\Protected;
use Illuminate\Routing\Controller as BaseController;

class ProtectedTestController extends BaseController
{
    public function testHandler(): string
    {
        return "Hello from protected controller";
    }
}
