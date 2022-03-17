<?php

namespace Debva\LaravelTelegram\Concerns;

use Illuminate\Support\Str;
use Debva\LaravelTelegram\Telegram;
use Illuminate\Support\Facades\Http;

trait InteractsWithTelegram
{
    public function getBot()
    {
        return $this->bot;
    }

    public function sendRequest($chat_id)
    {
        
    }

    public static function __callStatic($method, $params)
    {
        if (Str::startsWith($method, "send")) {
            return (new static)->{strtolower(substr($method, 4))}(...$params);
        };
        
        throw new \BadMethodCallException("Method [{$method}] does not exist.");
    }

    protected function message($message)
    {
        $this->endpoint =  Telegram::SEND_MESSAGE;
        $this->data = [
            "text" => $message,
        ];

        return $this;
    }
}
