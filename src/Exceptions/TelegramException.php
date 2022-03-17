<?php

namespace Debva\LaravelTelegram\Exceptions;


class TelegramException extends \Exception
{
    public static function tokenUndefined(): TelegramException
    {
        return new self("Telegram token is not defined.");
    }
}
