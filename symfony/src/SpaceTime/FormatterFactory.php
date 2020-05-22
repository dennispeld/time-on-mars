<?php

namespace App\SpaceTime;

class FormatterFactory
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
