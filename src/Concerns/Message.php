<?php

namespace Debva\LaravelTelegram\Concerns;

use Debva\LaravelTelegram\Telegram;

trait Message
{
    public function sendMessage($message)
    {
        $this->endpoint = Telegram::SEND_MESSAGE;
        $this->data["text"] = $message;
        return $this;
    }

    public function html()
    {
        $this->data["parse_mode"] = Telegram::PARSE_MODE_HTML;
        return $this;
    }

    public function markdown()
    {
        $this->data["parse_mode"] = Telegram::PARSE_MODE_MARKDOWN;
        return $this;
    }
}
