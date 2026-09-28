# Changelog

## [v0.1.3](https://github.com/runapi-ai/openai-tts-php/releases/tag/v0.1.3) - 2026-09-28

### Added
- Return usage.cost as a float USD amount on completed async Task query and webhook envelopes.

### Removed
- Remove the public Task billing object from Task envelopes.
  Migration: Read usage.cost on completed Task envelopes. Create, processing, and failed envelopes omit usage.


## [v0.1.2](https://github.com/runapi-ai/openai-tts-php/releases/tag/v0.1.2) - 2026-09-04

### Changed
- Return terminal speech responses whether the request completes directly or through an accepted Task.


## [v0.1.1](https://github.com/runapi-ai/openai-tts-php/releases/tag/v0.1.1) - 2026-07-28

### Added
- Decode typed Task Billing Facts on synchronous text-to-speech responses.


## [v0.1.0](https://github.com/runapi-ai/openai-tts-php/releases/tag/v0.1.0) - 2026-07-20

### Added
- Add a synchronous PHP text-to-speech client with typed managed MP3 metadata.
