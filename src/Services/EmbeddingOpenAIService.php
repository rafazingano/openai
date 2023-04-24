<?php

namespace RafaZingano\OpenAi\Services;

use GuzzleHttp\Exception\ClientException;
use Exception;

class EmbeddingOpenAIService extends OpenAIService
{

    public function create($model, $input, $user = null)
    {
        $options = [
            'model' => $model,
            'input' => $input,
        ];
    
        if (isset($user)) {
            $options['user'] = $user;
        }
    
        try {
            $response = $this->client->post('/embeddings', [
                'headers' => $this->headers,
                'json' => $options,
            ]);
    
            return $response;
        } catch (ClientException $e) {
            throw new Exception("Error getting embeddings: {$e->getMessage()}");
        }
    }
}
