<?php

declare(strict_types=1);

namespace RunApi\OpenaiTts\Tests\Unit;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use RunApi\Core\ClientOptions;
use RunApi\Core\Errors\ValidationException;
use RunApi\Core\Tests\Fixtures\QueueHttpClient;
use RunApi\OpenaiTts\Models\TextToSpeechResponse;
use RunApi\OpenaiTts\OpenaiTtsClient;
use RunApi\OpenaiTts\Resources\TextToSpeech;

final class OpenaiTtsClientTest extends TestCase
{
    public function testExposesTypedSynchronousResource(): void
    {
        $client = new OpenaiTtsClient(new ClientOptions(apiKey: 'k', httpClient: new QueueHttpClient([]), maxRetries: 0));

        self::assertInstanceOf(TextToSpeech::class, $client->textToSpeech);
    }

    public function testRunPostsOnlyPublicParamsAndReturnsManagedAudio(): void
    {
        $transport = new QueueHttpClient([
            new Response(200, [], '{"id":"task_1","status":"completed","audios":[{"url":"https://runapi.ai/audio.mp3","format":"mp3","mime_type":"audio/mpeg","size_bytes":128}],"extra_field":"kept"}'),
        ]);
        $client = new OpenaiTtsClient(new ClientOptions(apiKey: 'k', httpClient: $transport, maxRetries: 0));

        $result = $client->textToSpeech->run([
            'model' => 'tts-1',
            'text' => 'Hello from RunAPI',
        ]);

        $body = json_decode((string) $transport->requests[0]->getBody(), true, flags: JSON_THROW_ON_ERROR);

        self::assertInstanceOf(TextToSpeechResponse::class, $result);
        self::assertSame('completed', $result->status);
        self::assertSame('audio/mpeg', $result->audios[0]->mimeType);
        self::assertSame(128, $result->audios[0]->sizeBytes);
        self::assertSame('kept', $result->toArray()['extra_field']);
        self::assertSame(['model' => 'tts-1', 'text' => 'Hello from RunAPI'], $body);
        self::assertSame('/api/v1/openai_tts/text_to_speech', $transport->requests[0]->getUri()->getPath());
    }

    public function testRunRequiresManagedAudioMetadata(): void
    {
        $transport = new QueueHttpClient([
            new Response(200, [], '{"id":"task_1","status":"completed","audios":[{"url":"https://runapi.ai/audio.mp3"}]}'),
        ]);
        $client = new OpenaiTtsClient(new ClientOptions(apiKey: 'k', httpClient: $transport, maxRetries: 0));

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('format must be a string');

        $client->textToSpeech->run([
            'model' => 'tts-1',
            'text' => 'Hello from RunAPI',
        ]);
    }
}
