<?php

declare(strict_types = 1);

namespace App\SpaceTime;

/**
 * Factory, that takes any Converter class, that implements
 * ConverterInterface and calls its methods
 */
class ConverterFactory
{
    private ConverterInterface $converter;

    public function __construct(ConverterInterface $converter)
    {
        $this->converter = $converter;
    }

    public function getDate(): string
    {
        return $this->converter->getDate();
    }

    public function getTime(): string
    {
        return $this->converter->getTime();
    }
}
