<?php

namespace App\Service;

use App\Http\Requests\Auth\LoginRequestDto;
use App\Http\Requests\Auth\RegistrationRequestDto;
use App\Http\Responses\User\LoginResponseDto;
use App\Http\Responses\User\UserResponseDto;

interface AuthService
{
    public function Registration(RegistrationRequestDto $RegistrationRequestDto): UserResponseDto;
    public function Login(LoginRequestDto $loginRequestDto): LoginResponseDto;
}
