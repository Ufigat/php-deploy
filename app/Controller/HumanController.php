<?php 

namespace App\Controller;

use App\Service\HumanServiceInterface;

class HumanController {

    private HumanServiceInterface $humanService;

    public function __construct(HumanServiceInterface $humanService)
    {
        $this->humanService = $humanService;
    }

    public function GetName(){
        
        $name = $this->humanService->sayMyName();

        return [
            'data' => [
                'info' => $name
            ],
            'code' => 200
        ];
    }
}