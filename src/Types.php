<?php

declare(strict_types=1);

namespace RunApi\OpenaiTts;

final class Types
{
    /**
     * Allowed model slugs for text to speech requests.
     *
     * @var list<string>
     */
    public const TEXT_TO_SPEECH_MODELS = ['tts-1', 'tts-1-hd'];

    private function __construct()
    {
    }
}
