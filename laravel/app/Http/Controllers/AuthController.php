<?php

namespace App\Http\Controllers;

use App\Exceptions\Errors\UserNotFoundException;
use App\Http\Requests\Auth\LoginRequestDto;
use App\Http\Requests\Auth\RegistrationRequestDto;
use App\Service\authService\IAuthService;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends BaseController
{

    private IAuthService $authService;
    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Registration User
     * @param RegistrationRequestDto $registrationRequestDto
     * @return \Illuminate\Http\JsonResponse
     */
    public function registrationHandler(RegistrationRequestDto $registrationRequestDto): JsonResponse
    {
        return response()->json(
            data: $this->authService->Registration($registrationRequestDto),
            status: Response::HTTP_OK,
            headers: ["Content-Type" => "application/json"]);
    }

    /**
     * Login User
     * @param LoginRequestDto $loginRequestDto
     * @return JsonResponse
     * @throws UserNotFoundException
     */
    public function loginHandler(LoginRequestDto $loginRequestDto): JsonResponse
    {
        return response()->json(
            data: $this->authService->Login($loginRequestDto),
            status: Response::HTTP_OK,
            headers: ["Content-Type" => "application/json"]);
    }
}
