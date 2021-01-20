# TelegramAPI
Simple SDK to provide updates via Longpoll Telegram Bots API

## Install
Install with **composer** using command bellow

`composer require sergeich5/telegram-api`

## Usage
1. Create your class which extends `\Sergeich5\Telegram\Callback\CallbackHandler`

```
<?php

class MyCallbackHandler extends \Sergeich5\Telegram\Callback\CallbackHandler {}
```
2. Override functions to handle updates for
+ **New Messages**: ```function messageNew(array $object) : void { /* TODO your business logic here */ }```
+ **Edit Messages**: ```function messageEdit(array $object) : void { /* TODO your business logic here */ }```
+ **Update Poll**: ```function pollUpdate(array $object) : void { /* TODO your business logic here */ }```
+ **Answer Poll**: ```function pollAnswer(array $object) : void { /* TODO your business logic here */ }```
+ **Callback Query**: ```function callbackQuery(array $object) : void { /* TODO your business logic here */ }```

3. Start Longpolling
```
<?php

set_time_limit(0);

require_once __DIR__.'/../vendor/autoload.php';

$bot = new \Sergeich5\Telegram\Bots\BotLongpollAPI("BOT TOKEN");

$handler = new MyCallbackHandler();

$bot->getUpdatesLoop($handler);
```
