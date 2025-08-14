<?php

declare(strict_types=1);

namespace Laravel\Boost\Install\CodeEnvironment;

use Laravel\Boost\Contracts\Agent;
use Laravel\Boost\Install\Enums\Platform;

class GeminiCli extends CodeEnvironment implements Agent
{
    public function name(): string
    {
        return 'gemini';
    }

    public function displayName(): string
    {
        return 'Gemini CLI';
    }

    public function agentName(): ?string
    {
        return 'Gemini CLI';
    }

    public function systemDetectionConfig(Platform $platform): array
    {
        return match ($platform) {
            Platform::Darwin, Platform::Linux => [
                'command' => 'which gemini',
            ],
            Platform::Windows => [
                'command' => 'where gemini',
            ],
        };
    }

    public function projectDetectionConfig(): array
    {
        return [
            'paths' => ['.gemini'],
        ];
    }

    public function guidelinesPath(): string
    {
        return '.gemini/guidelines.md';
    }

    public function frontmatter(): bool
    {
        return false;
    }
}
