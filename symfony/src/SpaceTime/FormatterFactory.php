<?php

declare(strict_types = 1);

namespace App\SpaceTime;

/**
 * Factory, that takes any Formatter class, that implements 
 * FormatterInterface and calls its method
 */
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
