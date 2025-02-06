<?php

namespace App\Services;

use App\Models\Topic;
use App\Requests\PromptRequest;
use App\Responses\PromptResponse;
use Illuminate\Support\Facades\Cache;
use App\Repositories\TopicRepository;
use App\services\Interfaces\LLMClientInterface;

class IAService
{
    /**
     * @param TopicRepository $topicRepository
     */
    public function __construct(private TopicRepository $topicRepository){}

    /**
     * @param string $key
     * @return PromptResponse
     */
    public function generateContent(PromptRequest $request)
    {   
        $topics = $this->getHistoryTopics($request);
        
        $topicModel = $this->topicRepository->findByKey($request->getTopic());
        
        $prompt = $this->makePrompt($topicModel);

        $text = $this->getLLM(new GeminiService, $prompt);

        $response = new PromptResponse;
        $response->setText($text);
        $response->setOptions($topics);

        return $response;
    }

    /**
     * @param PromptRequest $request
     * @return array
     */
    private function getHistoryTopics(PromptRequest $request) : array
    {
        $topics = Cache::get("topic_{$request->getUsername()}", []);
        if (count($topics) == 0) {
            $keys = $this->topicRepository->getTopicKeys();
            Cache::put("topic_{$request->getUsername()}", $keys->pluck('key')->toArray());
            $topics = Cache::get("topic_{$request->getUsername()}", []);
        }

        $options = array_filter($topics, fn($topic) => $topic != $request->getTopic());
        Cache::put("topic_{$request->getUsername()}", array_values($options));
        $topics = Cache::get("topic_{$request->getUsername()}", []);

        return $topics;
    }

    /**
     * @param Topic $topic
     * @return string
     */
    private function makePrompt(Topic $topic) : string
    {
        $prompt = 'Com base nos seguintes dados, gere um texto';
        $prompt .= strtoupper($topic->key) . ": " . $topic->title . " - " . $topic->description . "\n";

        return $prompt;
    }

    /**
     * @param LLMClientInterface $llmInterfaceClient
     * @param string $prompt
     * @return string
     */
    private function getLLM(LLMClientInterface $llmClient, string $prompt) : string
    {
        return $llmClient->generateText($prompt);
    }
}