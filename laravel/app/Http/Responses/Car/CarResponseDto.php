<?php

namespace App\Http\Responses\Car;

use App\Http\Responses\ResponseDto;
use App\Models\Car;

class CarResponseDto extends ResponseDto
{
    /**
     * @return void
     */
    public function __construct(Car $car)
    {
        $this->message = "Car was created";
        $this->data = [
            'brand' => $car->getAttribute("brand"),
            'color' => $car->getAttribute("color"),
            'number' => $car->getAttribute("number"),
        ];
    }
}
