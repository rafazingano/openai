<?php

namespace RafaZingano\OpenAi\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Exception;

class OpenAIService
{
    protected $base_uri;
    protected $client;
    protected $headers;

    public function __construct()
    {
        $apiKey = env('OPENAI_API_KEY');
        if (!$apiKey) {
            throw new Exception('A variável de ambiente OPENAI_API_KEY não está definida.');
        }

        $this->headers['Authorization'] = 'Bearer ' . $apiKey;

        $organization = env('OPENAI_ORGANIZATION');
        if ($organization) {
            $this->headers['OpenAI-Organization'] = $organization;
        }

        $this->headers['Content-Type'] = 'application/json';
        $this->base_uri = 'https://api.openai.com/v1';

        try {
            $this->client = new Client([
                'base_uri' => $this->base_uri,
                'headers' => $this->headers
            ]);
        } catch (ClientException $e) {
            throw new Exception('Não foi possível conectar ao serviço OpenAI.');
        }
    }
}
