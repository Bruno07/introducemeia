<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Services\Interfaces\LLMClientInterface;

class GeminiService implements LLMClientInterface
{
    /**
     * @param string $prompt
     * @return string
     */
    public function generateText(string $prompt): string
    {
        $apiKey = getenv('GEMINI_API_KEY');
        $client = new Client(['base_uri' => getenv('GEMINI_URI')]);

        $content['contents'] = ['parts' => ['text' => $prompt]];

        $response = $client->request("POST", "v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}", [
            'body' => json_encode($content)
        ]);

        $response = json_decode((string)$response->getBody());

        return $response->candidates[0]->content->parts[0]->text;
    }
}