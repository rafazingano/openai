<?php

namespace RafaZingano\OpenAi\Services;

use GuzzleHttp\Client;
use Exception;

class OpenAIService
{
    protected $base_uri;
    protected $client;
    protected $headers;

    public function __construct()
    {
        $apiKey = env('OPENAI_API_KEY');
        $organization = env('OPENAI_ORGANIZATION');

        if (!$apiKey) {
            throw new Exception('A variável de ambiente OPENAI_API_KEY não está definida.');
        }

        $this->headers['Authorization'] = 'Bearer ' . $apiKey;

        if ($organization) {
            $this->headers['OpenAI-Organization'] = $organization;
        }

        $this->headers['Content-Type'] = 'application/json';
        $this->base_uri = 'https://api.openai.com/v1/';

        try {
            $this->client = new Client([
                'base_uri' => $this->base_uri,
                'headers' => $this->headers
            ]);
        } catch (Exception $e) {
            throw new Exception('Não foi possível conectar ao serviço OpenAI.');
        }
    }
}
