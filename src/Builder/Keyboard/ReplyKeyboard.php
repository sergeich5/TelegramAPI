<?php

namespace Sergeich5\Telegram\Builder\Keyboard;

class ReplyKeyboard extends Keyboard
{
    private bool $oneTime = true;

    function build(): string
    {
        $arr = array(
            'one_time_keyboard' => $this->oneTime,
            'keyboard' => $this->rows
        );

        return json_encode($arr, JSON_UNESCAPED_UNICODE);
    }
}