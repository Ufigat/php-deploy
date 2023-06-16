<?php

namespace App\Service\authService;

use App\Exceptions\Errors\UserNotFoundException;
use App\Http\Requests\Auth\LoginRequestDto;
use App\Http\Requests\Auth\RegistrationRequestDto;
use App\Http\Responses\User\LoginResponseDto;
use App\Http\Responses\User\UserResponseDto;
use App\Models\User;
use App\Service\AuthService;
use JWTAuth;
use Illuminate\Support\Facades\Hash;

class IAuthService implements AuthService
{
    /**
     * @param RegistrationRequestDto $registrationRequestDto
     * @return UserResponseDto
     */
    public function Registration(RegistrationRequestDto $registrationRequestDto): UserResponseDto
    {
        $requestArray = $registrationRequestDto->request->all();

        $user = User::where('name', '=', $requestArray['name'])->first();

        if (isset($user)) {
            return new UserResponseDto("User already exist", $user);
        }

        $user = User::create([
            'name' => $requestArray['name'],
            'email' => $requestArray['email'],
            'password' => Hash::make($requestArray['password']),
        ]);

        return new UserResponseDto("User was registered", $user);
    }

    /**
     * @param LoginRequestDto $loginRequestDto
     * @return LoginResponseDto
     * @throws UserNotFoundException
     */
    public function Login(LoginRequestDto $loginRequestDto): LoginResponseDto
    {
        $requestArray = $loginRequestDto->request->all();

        $user = User::where('name', '=', $requestArray['name'])
            ->where('email', '=', $requestArray['email'])
            ->first();

        if (!$user || !Hash::check($requestArray['password'], $user->password)) {
            throw new UserNotFoundException("The provided credentials are incorrect");
        }

        $credentials = ["email" => $requestArray["email"], "password" => $requestArray["password"]];

        $token = JWTAuth::attempt($credentials);

        return new LoginResponseDto("User Logged In successfully", $token);;
    }
}
