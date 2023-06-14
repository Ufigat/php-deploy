<?php

namespace App\Service\JobService;

use App\Http\Requests\LoggerDto;
use App\Models\Logging;
use Illuminate\Support\Facades\Log;

class ProcessLoggingService
{
    public function logging(LoggerDto $loggerDto)
    {
        Logging::create($loggerDto->createArray());
    }
}
