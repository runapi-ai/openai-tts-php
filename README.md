# OpenAI TTS PHP SDK for RunAPI

[![Packagist](https://img.shields.io/packagist/v/runapi-ai/openai-tts)](https://packagist.org/packages/runapi-ai/openai-tts)
[![License](https://img.shields.io/github/license/runapi-ai/openai-tts-php)](https://github.com/runapi-ai/openai-tts-php/blob/main/LICENSE)

Use the OpenAI TTS PHP SDK to generate speech through RunAPI with a
synchronous Composer client and typed managed-audio responses.

## Install

```bash
composer require runapi-ai/openai-tts
```

## Quick start

```php
<?php

require __DIR__ . "/vendor/autoload.php";

use RunApi\OpenaiTts\OpenaiTtsClient;

$client = new OpenaiTtsClient(); // reads RUNAPI_API_KEY
$result = $client->textToSpeech->run([
    'model' => 'tts-1',
    'text' => 'A product render',
]);

echo $result->audios[0]->url . PHP_EOL;
```

Pass request parameters as associative arrays with snake_case keys. Keep
`RUNAPI_API_KEY` in the environment or your secret manager.

## Links

- Model page: https://runapi.ai/models/openai-tts
- SDK docs: https://runapi.ai/docs/resources/sdks
- Product docs: https://runapi.ai/docs/api/openai-tts/text-to-speech
- Pricing and rate limits: https://runapi.ai/models/openai-tts/tts-1
- Full catalog: https://runapi.ai/models
- GitHub repository: https://github.com/runapi-ai/openai-tts-php
- Multi-language SDK repository: https://github.com/runapi-ai/openai-tts-sdk

## License

Licensed under the Apache License, Version 2.0.
