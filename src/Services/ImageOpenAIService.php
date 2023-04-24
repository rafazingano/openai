<?php

namespace RafaZingano\OpenAi\Services;

use Exception;

class ImageOpenAIService extends OpenAIService
{

    public function create($prompt, $options = [])
    {
        $data = [
            'prompt' => $prompt
        ];

        if (isset($options['n'])) {
            $data['n'] = $options['n'];
        }

        if (isset($options['size'])) {
            $data['size'] = $options['size'];
        }

        if (isset($options['response_format'])) {
            $data['response_format'] = $options['response_format'];
        }

        if (isset($options['user'])) {
            $data['user'] = $options['user'];
        }

        try {
            $response = $this->client->post('/images/generations', [
                'json' => $data
            ]);

            return $response;
        } catch (Exception $e) {
            throw new Exception('Could not generate image: ' . $e->getMessage());
        }
    }

    public function createEdit($image, $prompt, $options = [])
    {
        $data = [
            'prompt' => $prompt,
            'image' => $image
        ];

        if (isset($options['mask'])) {
            $data['mask'] = $options['mask'];
        }

        if (isset($options['n'])) {
            $data['n'] = $options['n'];
        }

        if (isset($options['size'])) {
            $data['size'] = $options['size'];
        }

        if (isset($options['response_format'])) {
            $data['response_format'] = $options['response_format'];
        }

        if (isset($options['user'])) {
            $data['user'] = $options['user'];
        }

        try {
            $response = $this->client->post('/images/edits', [
                'multipart' => $data
            ]);

            return $response;
        } catch (ClientException $e) {
            return $e->getMessage();
        }
    }

    public function createVariation($image, $options = [])
    {
        $data = [
            'image' => fopen($image, 'r')
        ];

        if (isset($options['n'])) {
            $data['n'] = $options['n'];
        }

        if (isset($options['size'])) {
            $data['size'] = $options['size'];
        }

        if (isset($options['response_format'])) {
            $data['response_format'] = $options['response_format'];
        }

        if (isset($options['user'])) {
            $data['user'] = $options['user'];
        }

        try {
            $response = $this->client->post('/images/variations', [
                'multipart' => $data
            ]);

            return $response;
        } catch (ClientException $e) {
            return $e->getMessage();
        }

    }

}
