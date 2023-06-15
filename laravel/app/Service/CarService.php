<?php

namespace App\Service;

use App\Http\Requests\CarRequestDto;
use App\Http\Responses\Car\CarResponseDto;

interface CarService
{
    public function CreateCar(CarRequestDto $carRequest): CarResponseDto;
}
