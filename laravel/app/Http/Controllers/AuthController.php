<?php

namespace App\Http\Controllers;

use App\Exceptions\Errors\UserNotFoundException;
use App\Http\Requests\Auth\LoginRequestDto;
use App\Http\Requests\Auth\RegistrationRequestDto;
use App\Service\authService\IAuthService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

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

    public function logoutHandler(Request $request): Response
    {
        try {
            JWTAuth::invalidate($request->header("Authorization"));

            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
