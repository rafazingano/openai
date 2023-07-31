<?php

namespace RafaZingano\OpenAi\Services;

class TokenizerOpenAIService extends OpenAIService
{

    public function count($text)
    {
        try {
            $response = $this->client->post('tokenizer', [
                'text' => $text,
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                return json_decode($response->getBody(), true);
            } else {
                throw new \Exception("A API retornou o código de status {$statusCode}");
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
