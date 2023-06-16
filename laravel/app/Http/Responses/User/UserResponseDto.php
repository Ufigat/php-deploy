<?php

namespace App\Http\Responses\User;

use App\Http\Responses\ResponseDto;
use App\Models\User;

class UserResponseDto extends ResponseDto
{
    /**
     * @return void
     */
    public function __construct(string $message, User $user)
    {
        $this->message = $message;
        $this->data = [
            'name' => $user->getAttribute("name"),
            'email' => $user->getAttribute("email"),
        ];
    }
}
