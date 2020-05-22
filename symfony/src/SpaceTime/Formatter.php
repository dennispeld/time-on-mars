<?php

namespace App\SpaceTime;

class Formatter
{
    private FormatterInterface $formatter;

    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    public function getFormattedOutputAsJsonString(): string
    {
        return $this->formatter->getFormattedOutputAsJsonString();
    }
}
