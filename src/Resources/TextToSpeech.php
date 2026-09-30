<?php

declare(strict_types=1);

namespace RunApi\OpenaiTts\Resources;

use RunApi\Core\Http\HttpClient;
use RunApi\Core\RequestOptions;
use RunApi\OpenaiTts\Models\TextToSpeechResponse;

/** Text to speech operations for OpenAI TTS. */
readonly class TextToSpeech extends SyncResource
{
    /**
     * Run text to speech and return its response.
     *
     * @param array{
     *   text: string,
     *   model?: string
     * } $params
     */
    public function run(array $params, ?RequestOptions $options = null): TextToSpeechResponse
    {
        $response = parent::run($params, $options);

        /** @var TextToSpeechResponse $response */
        return $response;
    }

    /** Create the resource using the shared RunAPI HTTP transport. */
    public static function fromHttp(HttpClient $http): self
    {
        return new self(
            $http,
            '/api/v1/openai_tts/text_to_speech',
            TextToSpeechResponse::class,
        );
    }
}
