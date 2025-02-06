<?php

namespace App\Requests;

class PromptRequest
{
    /**
     * @property string $topic
     */
    private string $topic;

    /**
     * @property string $username
     */
    private string $username;

    /**
     * Get the value of topic
     *
     * @return string
     */
    public function getTopic(): string
    {
        return $this->topic;
    }

    /**
     * Set the value of topic
     *
     * @param string $topic
     *
     * @return self
     */
    public function setTopic(string $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get the value of username
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @param string $username
     *
     * @return self
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }
}