<?php

namespace App\Model;

class Human
{
    public string $name;

    function Talking(): string
    {
        return $this->name;
    }
}