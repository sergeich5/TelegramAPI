<?php


namespace Sergeich5\Telegram\Builder\Keyboard;

use Sergeich5\Telegram\Builder\Button\Button;


abstract class Keyboard
{
    protected array $rows = [];

    protected function getRowsCount() : int
    {
        return count($this->rows);
    }

    function addRow(Button $button1, Button $button2 = null, Button $button3 = null, Button $button4 = null, Button $button5 = null) : Keyboard
    {
        $i = count($this->rows);
        $this->rows[] = [$button1->build()];

        if (!is_null($button2))
            $this->rows[$i][] = $button2->build();

        if (!is_null($button3))
            $this->rows[$i][] = $button3->build();

        if (!is_null($button4))
            $this->rows[$i][] = $button4->build();

        if (!is_null($button5))
            $this->rows[$i][] = $button5->build();

        return $this;
    }

    abstract function build() : string;
}