<?php

namespace Debva\LaravelTelegram;

use Debva\LaravelTelegram\Client\TelegramRequest;
use Illuminate\Support\Str;
use Debva\LaravelTelegram\Concerns\Message;
use Debva\LaravelTelegram\Exceptions\TelegramException;

class Telegram
{
    use Message;

    protected const TELEGRAM_API_BASE_URL  = "https://api.telegram.org/bot";
    protected const PARSE_MODE_HTML        = "html";
    protected const PARSE_MODE_MARKDOWN    = "markdown";

    protected const SEND_ANIMATION  = "sendAnimation";
    protected const SEND_AUDIO      = "sendAudio";
    protected const SEND_DOCUMENT   = "sendDocument";
    protected const SEND_LOCATION   = "sendLocation";
    protected const SEND_MESSAGE    = "sendMessage";
    protected const SEND_PHOTO      = "sendPhoto";
    protected const SEND_VIDEO      = "sendVideo";
    protected const SEND_VOICE      = "sendVoice";

    protected string $token;
    protected string $bot;
    protected string $endpoint;
    protected array $data = [];

    public function __construct()
    {
        if (!$token = config('telegram.token')) {
            throw TelegramException::tokenNotSet();
        }

        $this->token = $token;
        $this->bot = Str::of(self::TELEGRAM_API_BASE_URL)->append($this->token, "/");
    }

    public function send($chat_id)
    {
        $this->buildBot($chat_id);
        app(TelegramRequest::class, ["bot" => $this->bot, "data" => $this->data]);
    }

    protected function buildBot($chat_id)
    {
        $this->bot .= $this->endpoint;
        $this->data["chat_id"] = $chat_id;
        array_key_exists("parse_mode", $this->data) ?: $this->data["parse_mode"] = Telegram::PARSE_MODE_HTML;
    }
}
