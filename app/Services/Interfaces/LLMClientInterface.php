<?php

namespace App\services\Interfaces;

interface LLMClientInterface
{
    /**
     * @param string $prompt
     * @return string
     */
    public function generateText(string $prompt) : string;
}