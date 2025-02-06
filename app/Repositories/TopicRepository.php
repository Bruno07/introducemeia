<?php

namespace App\Repositories;

use App\Models\Topic;

class TopicRepository
{
    /**
     * @param string $key
     * @return Topic|null
     */
    public function findByKey(string $key) : ?Topic
    {
        return Topic::where('key', $key)
            ->first();
    }

    /**
     * @return Collection
     */
    public function getTopicKeys()
    {
        return Topic::query()
            ->select('key')
            ->where('is_hidden', 1)
            ->get();
    }
}