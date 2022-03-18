<?php

namespace Debva\LaravelTelegram\Client;

use Illuminate\Support\Facades\Http;

class TelegramRequest
{
    public function __construct($bot, $data)
    {
        Http::post($bot, $data);
    }
}
