<?php

namespace RafaZingano\OpenAi\Services;

class ModerationOpenAIService extends OpenAIService
{

    public function create($input)
    {
        $response = $this->client->post('/moderations', [
            'json' => [
                'input' => $input,
            ],
        ]);

        return $response;
    }
}
