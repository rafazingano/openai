<?php

namespace RafaZingano\OpenAi\Services;

class ModelOpenAIService extends OpenAIService
{

    public function list()
    {
        try {
            $response = $this->client->get('models');
            $statusCode = $response->getStatusCode();
            $body = $response->getBody();

            if ($statusCode == 200) {
                $models = json_decode($body, true);
                return $models;
            } else {
                throw new \Exception("A API retornou o código de status {$statusCode}: {$body}");
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function retrieve($modelId)
    {
        try {
            $response = $this->client->get('models/' . $modelId);
            $statusCode = $response->getStatusCode();
            $body = $response->getBody();

            if ($statusCode == 200) {
                $models = json_decode($body, true);
                return $models;
            } else {
                throw new \Exception("A API retornou o código de status {$statusCode}: {$body}");
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
