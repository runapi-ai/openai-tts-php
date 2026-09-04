<?php

declare(strict_types=1);

namespace RunApi\OpenaiTts\Resources;

use RunApi\Core\Resources\HybridResource;

/** Shared synchronous request boundary for OpenAI TTS helper resources. */
abstract readonly class SyncResource extends HybridResource
{
}
