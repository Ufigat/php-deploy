<?php

namespace App\Service;

use App\Model\Human;

class HumanService implements HumanServiceInterface {

    private Human $human;

    function __construct(Human $human) {
        $this->human = $human;
    }

    public function sayMyName() : string
    {
       return "Hello, my name is " . $this->human->Talking();
    }
}