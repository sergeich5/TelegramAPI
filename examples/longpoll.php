<?php

require_once __DIR__.'/../vendor/autoload.php';

$bot = new \Sergeich5\Telegram\Bots\BotLongpollAPI("BOT TOKEN");

$handler = new MyCallbackHandler();

$bot->getUpdatesLoop($handler);

class MyCallbackHandler extends Sergeich5\Telegram\Callback\CallbackHandler {
    function messageNew(array $object)
    {
        echo "New message";
        print_r($object);
    }

    function messageEdit(array $object)
    {
        echo "Edit message";
        print_r($object);
    }

    function pollUpdate(array $object)
    {
        echo "Poll update";
        print_r($object);
    }

    function pollAnswer(array $object)
    {
        echo "Poll answer";
        print_r($object);
    }

    function callbackQuery(array $object)
    {
        echo "Callback query";
        print_r($object);
    }
}
