<?php

namespace RafaZingano\OpenAi\Services;

class FileOpenAIService extends OpenAIService
{

    public function list()
    {
        $response = $this->client->get('/files');

        return $response;
    }

    public function upload($filePath)
    {
        $response = $this->client->post('/files', [
            'multipart' => [
                [
                    'name' => 'purpose',
                    'contents' => 'fine-tune'
                ],
                [
                    'name' => 'file',
                    'contents' => fopen($filePath, 'r'),
                    'filename' => 'mydata.jsonl'
                ]
            ]
        ]);

        return $response;
    }

    public function delete($fileId)
    {
        $response = $this->client->delete('/files/' . $fileId);

        return $response;
    }

    public function retrieve($fileId)
    {
        $response = $this->client->get('/files/' . $fileId);

        return $response;
    }

    public function retrieveContent($fileId)
    {
        $response = $this->client->get('/files/' . $fileId . '/content');

        return $response;
    }
}
