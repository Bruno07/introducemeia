<?php

namespace App\Services;

use App\Exceptions\IAException;
use GuzzleHttp\Client;
use App\Services\Interfaces\LLMClientInterface;
use Exception;

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

        try {
            $response = $client->request("POST", "v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}", [
                'body' => json_encode($content)
            ]);
    
            $response = json_decode((string)$response->getBody());
    
            return $response->candidates[0]->content->parts[0]->text;
        } catch (Exception $e) {
            throw new IAException($e->getMessage());
        }

    }
}