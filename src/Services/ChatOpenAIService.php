<?php

namespace RafaZingano\OpenAi\Services;

use GuzzleHttp\Exception\ClientException;
use Exception;
use RafaZingano\OpenAi\Services\OpenAIService;

class ChatOpenAIService extends OpenAIService
{

    public function create($model, $messages, $options = [])
    {
        $data = [
            'model' => $model,
            'messages' => $messages,
        ];

        if (isset($options['temperature'])) {
            $data['temperature'] = $options['temperature'];
        }

        if (isset($options['top_p'])) {
            $data['top_p'] = $options['top_p'];
        }

        if (isset($options['top_p'])) {
            $data['top_p'] = $options['top_p'];
        }

        if (isset($options['n'])) {
            $data['n'] = $options['n'];
        }

        if (isset($options['stream'])) {
            $data['stream'] = $options['stream'];
        }

        if (isset($options['stop'])) {
            $data['stop'] = $options['stop'];
        }

        if (isset($options['max_tokens'])) {
            $data['max_tokens'] = $options['max_tokens'];
        }

        if (isset($options['presence_penalty'])) {
            $data['presence_penalty'] = $options['presence_penalty'];
        }

        if (isset($options['frequency_penalty'])) {
            $data['frequency_penalty'] = $options['frequency_penalty'];
        }

        if (isset($options['logit_bias'])) {
            $data['logit_bias'] = $options['logit_bias'];
        }

        if (isset($options['user'])) {
            $data['user'] = $options['user'];
        }

        try {
            $response = $this->client->post('/chat/completions', [
                'json' => $data,
            ]);

            return $response;
        } catch (ClientException $e) {
            throw new Exception("Error processing API request: " . $e->getMessage());
        }
    }
}
