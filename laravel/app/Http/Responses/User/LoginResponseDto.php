<?php

namespace App\Http\Responses\User;

use App\Http\Responses\ResponseDto;
use App\Models\User;

class LoginResponseDto extends ResponseDto
{
    /**
     * @return void
     */
    public function __construct(string $message, string $token)
    {
        $this->message = $message;
        $this->data = [
            'token' => $token,
        ];
    }
}
