<?php

namespace App\Http\Controllers;

use App\Exceptions\IAException;
use App\Models\Topic;
use App\Requests\PromptRequest;
use App\Services\IAService;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     * @param IAService $iaService
     * @return void
     */
    public function __construct(private IAService $iaService)
    {}

    public function reply(Request $request)
    {
        try {

            $promptRequest = new PromptRequest;
            $promptRequest->setTopic($request->input('topic'));
            $promptRequest->setUsername($request->input('username'));

            $response = $this->iaService->generateContent($promptRequest);

            return response()->json([
                'text' => $response->getText(),
                'options' => $response->getOptions(),
            ]);

        } catch (IAException $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
}
