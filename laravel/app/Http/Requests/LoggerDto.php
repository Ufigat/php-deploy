<?php

namespace App\Http\Requests;

use \Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class LoggerDto
{
    private string $modelName;

    private string $action;

    private string $modelId;

    /**
     * @param string $modelName
     * @param string $action
     * @param string $modelId
     */
    public function __construct(string $modelName, string $action, string $modelId)
    {
        $this->modelName = $modelName;
        $this->action = $action;
        $this->modelId = $modelId;
    }

    public function createArray(): array
    {
        return [
            "model_name" => $this->modelName,
            "action" => $this->action,
            "model_id" => $this->modelId,
        ];
    }

    /**
     * @return string
     */
    public function getModelName(): string
    {
        return $this->modelName;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getModelId(): string
    {
        return $this->modelId;
    }


}
