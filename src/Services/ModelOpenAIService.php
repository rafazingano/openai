<?php

namespace RafaZingano\OpenAi\Services;

class ModelOpenAIService extends OpenAIService
{

    public function list()
    {
        $response = $this->client->get('/models');

        return $response;
    }

    public function retrieve($modelId)
    {
        $response = $this->client->get('/models/' . $modelId);

        return $response;
    }
}
