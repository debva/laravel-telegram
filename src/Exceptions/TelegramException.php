<?php

namespace Debva\LaravelTelegram\Exceptions;


class TelegramException extends \Exception
{
    public static function tokenNotSet(): TelegramException
    {
        return new self("Token not set.");
    }
}
