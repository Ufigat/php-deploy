<?php

namespace App\Jobs;

use App\Http\Requests\LoggerDto;
use App\Models\Car;
use App\Service\JobService\ProcessLoggingService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class ProcessLogging implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The podcast instance.
     *
     * @var \App\Models\Car
     */
    private LoggerDto $loggerDto;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(LoggerDto $loggerDto)
    {
        $this->loggerDto = $loggerDto;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ProcessLoggingService $processLoggingService)
    {
        $processLoggingService->logging($this->loggerDto);
    }

    /**
     * Handle a job failure.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
    }
}
