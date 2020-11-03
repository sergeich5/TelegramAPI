<?php


namespace Sergeich5\Telegram\Builder\Poll;

abstract class Poll
{
    protected string $question;
    protected array $options;
    protected bool $isAnonymous = true;

    function __construct(string $question)
    {
        $this->setQuestion($question);
    }

    function setQuestion(string $question) : self
    {
        $this->question = $question;
        return $this;
    }

    function isAnonymous(bool $isAnonymous) : self
    {
        $this->isAnonymous = $isAnonymous;
        return $this;
    }

    function addOption(string $option) : self
    {
        $this->options[] = $option;
        return $this;
    }



    abstract function build() : array;
}