<?php


namespace Sergeich5\Telegram\Builder\Poll;


class Quiz extends Poll
{
    private string $explanation;
    protected int $correct_option_id;

    function __construct(string $question)
    {
        parent::__construct($question);
    }

    function setExplanation(string $explanation) : self
    {
        $this->explanation = $explanation;
        return $this;
    }

    function addOption(string $option, bool $correct = false) : self
    {
        if ($correct)
            $this->correct_option_id = (isset($this->options)) ? count($this->options) : 0;

        $this->options[] = $option;

        return $this;
    }

    function getCorrectOptionId() : int
    {
        return $this->correct_option_id;
    }

    function build(): array
    {
        $arr = array(
            'type' => 'quiz',
            'question' => $this->question,
            'options' => json_encode($this->options),
            'correct_option_id' => $this->correct_option_id,
            'is_anonymous' => $this->isAnonymous
        );

        if (isset($this->explanation))
            $arr['explanation'] = $this->explanation;

        return $arr;
    }
}