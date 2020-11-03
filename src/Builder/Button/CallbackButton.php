<?php


namespace Sergeich5\Telegram\Builder\Button;

class CallbackButton extends Button
{
    private string $callbackData = '';

    function __construct(string $text, string $callbackData)
    {
        parent::__construct($text);
        $this->callbackData = $callbackData;
    }

    function setCallbackData(string $callbackData): self
    {
        $this->callbackData = $callbackData;
        return $this;
    }

    function build(): array
    {
        return array(
            'text' => $this->text,
            'callback_data' => $this->callbackData
        );
    }
}
