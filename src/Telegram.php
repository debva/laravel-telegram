<?php

namespace Debva\LaravelTelegram;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Debva\LaravelTelegram\Exceptions\TelegramException;
use Debva\LaravelTelegram\Concerns\InteractsWithTelegram;

class Telegram
{
    use InteractsWithTelegram;

    public const TELEGRAM_API_BASE_URL = "https://api.telegram.org/bot";
    public const PARSE_MODE_HTML = "html";
    public const PARSE_MODE_MARKDOWN = "markdown";
    public const SEND_MESSAGE = "sendMessage";

    protected ?string $bot;
    protected ?string $endpoint;
    protected array $data = [];

    public function __construct($token = null)
    {
        $token = $token ?? config("telegram.token");
        $this->bot = $token ? Str::of(self::TELEGRAM_API_BASE_URL)->append($token, "/") : null;
    }
    
    public function send($chat_id = null)
    {
        if (is_array($chat_id)) {
            foreach ($chat_id as $id) {
                $this->sendRequest($id);
            }

            return;
        }

        return Http::get("{$this->getBot()}{$this->endpoint}", $this->data);
    }
}
