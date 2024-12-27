<?php

namespace Lanos\DeepSeekClient;

use GuzzleHttp\Client;
use Lanos\DeepSeekClient\Interfaces\DeepSeekClientInterface;
use GuzzleHttp\Exception\GuzzleException;

class DeepSeekClient implements DeepSeekClientInterface
{
    private Client $httpClient;
    private string $apiKey;
    private string $baseUri = 'https://api.deepseek.com/v1/';

    public function __construct(Client $httpClient, string $apiKey = '')
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
    }

    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function sendRequest(string $method, string $endpoint, array $data = []): array
    {
        try {
            $response = $this->httpClient->request($method, $this->baseUri . $endpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new \RuntimeException('DeepSeek API request failed: ' . $e->getMessage());
        }
    }
}
