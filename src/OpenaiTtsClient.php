<?php

declare(strict_types=1);

namespace RunApi\OpenaiTts;

use RunApi\Core\BaseClient;
use RunApi\Core\ClientOptions;
use RunApi\OpenaiTts\Resources\TextToSpeech;

/**
 * OpenAI TTS RunAPI PHP client.
 *
 * The client exposes typed model resources plus the universal `files` and
 * `account` resources.
 */
final class OpenaiTtsClient extends BaseClient
{
    /** Text to speech operations for OpenAI TTS. */
    public readonly TextToSpeech $textToSpeech;

    /** Create a OpenAI TTS client with optional API key, base URL, and transport overrides. */
    public function __construct(ClientOptions $options = new ClientOptions())
    {
        parent::__construct($options);
        $this->textToSpeech = TextToSpeech::fromHttp($this->http);
    }
}
