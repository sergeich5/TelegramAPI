<?php


namespace Sergeich5\Telegram\Callback;



abstract class CallbackHandler
{
    function messageNew(array $object) {}

    function messageEdit(array $object) {}

    function pollAnswer(array $object) {}

    function pollUpdate(array $object) {}

    function callbackQuery(array $object) {}
}