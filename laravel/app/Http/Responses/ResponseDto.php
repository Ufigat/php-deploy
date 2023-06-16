<?php

namespace App\Http\Responses;

abstract class ResponseDto
{
    public string $message;

    public array $data;
}
