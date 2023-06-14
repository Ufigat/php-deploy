<?php

namespace App\Http\Responses;

use App\Models\Car;

class CarResponseDto
{
    public string $message;

    public array $data;

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
