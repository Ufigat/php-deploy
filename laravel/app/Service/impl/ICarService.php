<?php

namespace App\Service\impl;

use App\Http\Requests\CarRequestDto;
use App\Http\Requests\LoggerDto;
use App\Http\Responses\CarResponseDto;
use App\Jobs\ProcessLogging;
use App\Models\Car;
use App\Models\Logging;
use App\Service\CarService;

class ICarService implements CarService
{

    public function CreateCar(CarRequestDto $carRequest): CarResponseDto
    {
        $car = Car::create($carRequest->request->all());

        $log = new LoggerDto($car::class, "create", $car->id);

        ProcessLogging::dispatch($log);

        return new CarResponseDto($car);
    }
}
