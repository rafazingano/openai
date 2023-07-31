<?php

namespace RafaZingano\OpenAi\Services;

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
            $response = $this->client->post('embeddings', [
                'headers' => $this->headers,
                'json' => $options,
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                return $response->getBody();
            } else {
                throw new \Exception("A API retornou o código de status {$statusCode}");
            }
        } catch (Exception $e) {
            throw new Exception("Error getting embeddings: {$e->getMessage()}");
        }
    }
}
