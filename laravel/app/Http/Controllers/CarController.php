<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequestDto;
use App\Service\impl\ICarService;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CarController extends BaseController
{
    private ICarService $carService;
    public function __construct(ICarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * Creating a new car.
     * @param CarRequestDto $request
     * @return JsonResponse
     */
    public function CreateCarHandler(CarRequestDto $request): JsonResponse
    {
        return response()->json(
            data: $this->carService->CreateCar($request),
            status: Response::HTTP_OK,
            headers: ["Content-Type" => "application/json"]);
    }
}
