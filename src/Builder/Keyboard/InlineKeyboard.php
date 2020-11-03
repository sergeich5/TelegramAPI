<?php


namespace Sergeich5\Telegram\Builder\Keyboard;


class InlineKeyboard extends Keyboard
{
    function build(): string
    {
        $arr = array(
            'inline_keyboard' => $this->rows
        );

        return json_encode($arr, JSON_UNESCAPED_UNICODE);
    }
}