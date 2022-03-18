<?php

namespace Debva\LaravelTelegram\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Debva\LaravelTelegram\Telegram sendMessage($message)
 * @method \Debva\LaravelTelegram\Client\TelegramResponse send()
 * 
 * @see \Debva\LaravelTelegram\Telegram
 */

class Telegram extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return "Debva\\LaravelTelegram\\Telegram";
    }
}
