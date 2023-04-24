<?php

namespace RafaZingano\OpenAi\Services;

use GuzzleHttp\Exception\ClientException;
use Exception;

class AudioOpenAIService extends OpenAIService
{

    public function createTranscribe($file, $model, $options = [])
    {

        $data = [];

        $data[] = [
            'name' => 'file',
            'contents' => fopen($file, 'r')
        ];

        $data[] = [
            'name' => 'model',
            'contents' => $model
        ];

        if (isset($options['prompt'])) {
            $data[] = [
                'name' => 'prompt',
                'contents' => $options['prompt']
            ];
        }

        if (isset($options['response_format'])) {
            $data[] = [
                'name' => 'response_format',
                'contents' => $options['response_format']
            ];
        }

        if (isset($options['temperature'])) {
            $data[] = [
                'name' => 'temperature',
                'contents' => $options['temperature']
            ];
        }

        if (isset($options['language'])) {
            $data[] = [
                'name' => 'language',
                'contents' => $options['language']
            ];
        }

        try {
            $response = $this->client->post('/audio/transcriptions', [
                'multipart' => $data
            ]);

            return $response;
        } catch (ClientException $e) {
            throw new Exception("Error getting embeddings: {$e->getMessage()}");
        }
    }

    public function createTranslation($file, $model, $options = [])
    {
        $data = [
            [
                'name'     => 'file',
                'contents' => fopen($file, 'r')
            ],
            [
                'name'     => 'model',
                'contents' => $model
            ]
        ];

        if (isset($options['prompt'])) {
            $data[] = [
                'name'     => 'prompt',
                'contents' => $options['prompt']
            ];
        }

        if (isset($options['response_format'])) {
            $data[] = [
                'name'     => 'response_format',
                'contents' => $options['response_format']
            ];
        }

        if (isset($options['temperature'])) {
            $data[] = [
                'name'     => 'temperature',
                'contents' => $options['temperature']
            ];
        }

        try {
            $response = $this->client->post('https://api.openai.com/v1/audio/translations', [
                'multipart' => $data
            ]);

            return $response;
        } catch (ClientException $e) {
            throw new Exception("Error getting embeddings: {$e->getMessage()}");
        }
    }
}
