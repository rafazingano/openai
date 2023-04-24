<?php

namespace RafaZingano\OpenAi\Services;

use GuzzleHttp\Exception\ClientException;
use Exception;

class EditOpenAIService extends OpenAIService
{

    public function create($model, $instruction, $options = [])
    {
        $data = [
            'model' => $model,
            'instruction' => $instruction,
        ];

        if (isset($options['input'])) {
            $data['input'] = $options['input'];
        }

        if (isset($options['n'])) {
            $data['n'] = $options['n'];
        }

        if (isset($options['temperature'])) {
            $data['temperature'] = $options['temperature'];
        }

        if (isset($options['top_p'])) {
            $data['top_p'] = $options['top_p'];
        }

        try {
            $response = $this->client->post('/edits', [
                'json' => $data,
            ]);
            return $response;
        } catch (ClientException $e) {
            return $e->getMessage();
        }
    }
}
