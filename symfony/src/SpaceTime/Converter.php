<?php

namespace App\SpaceTime;

class Converter
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