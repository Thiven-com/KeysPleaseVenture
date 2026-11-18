<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    protected string $endpoint = 'https://brandbooster.app/api/b258d0fe-e304-4161-9917-fecd7ac12faf/contact/send-template-message';
    protected string $token = 'hdAnsDGbkeTXYhzpSrgBOOC9ym2oaX6aAS2UO5sc14uICprbcUgXyDxbXbG4wqD8';

    public function sendTemplateMessage(array $data)
    {
        $response = Http::withoutVerifying()->withHeaders([
            'Content-Type' => 'application/json',
        ])->post("{$this->endpoint}?token={$this->token}", $data);
        return $response->json();
    }
}
