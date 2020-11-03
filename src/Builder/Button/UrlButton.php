<?php


namespace Sergeich5\Telegram\Builder\Button;

class UrlButton extends Button
{
    private string $url = '';

    function __construct(string $text, string $url)
    {
        parent::__construct($text);
        $this->url = $url;
    }

    function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    function build(): array
    {
        return array(
            'text' => $this->text,
            'url' => $this->url
        );
    }
}
