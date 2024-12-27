<?php

namespace Lanos\DeepSeekClient\Interfaces;

interface DeepSeekClientInterface
{
    public function setApiKey(string $apiKey): void;
    
    public function getApiKey(): string;

    public function sendRequest(string $method, string $endpoint, array $data = []): array;
}
