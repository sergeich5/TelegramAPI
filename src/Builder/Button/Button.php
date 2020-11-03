<?php

namespace Sergeich5\Telegram\Builder\Button;

abstract class Button
{
    protected string $text = '';

    function __construct(string $text)
    {
        $this->text = $text;
    }

    function setText(string $text) : self
    {
        $this->text = $text;
        return $this;
    }

    abstract function build() : array;
}