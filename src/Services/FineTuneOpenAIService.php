<?php

namespace RafaZingano\OpenAi\Services;

class FineTuneOpenAIService extends OpenAIService
{

    public function create($fileId)
    {
        $response = $this->client->post('/fine-tunes', [
            'json' => [
                'training_file' => $fileId
            ]
        ]);

        return $response;
    }

    public function list()
    {
        $response = $this->client->get('/fine-tunes');

        return $response;
    }

    public function retrieve($fineTuneId)
    {
        $response = $this->client->get('/fine-tunes/' . $fineTuneId);

        return $response;
    }

    public function cancel($fineTuneId)
    {
        $response = $this->client->post('/fine-tunes/' . $fineTuneId . '/cancel');

        return $response;
    }

    public function events($fineTuneId)
    {
        $response = $this->client->get('/fine-tunes/' . $fineTuneId . '/events');

        return $response;
    }

    public function deleteModel($modelId)
    {
        $response = $this->client->delete('/models/' . $modelId);

        return $response;
    }
}
