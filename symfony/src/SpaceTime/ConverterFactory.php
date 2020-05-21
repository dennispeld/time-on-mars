<?php

namespace App\SpaceTime;

class ConverterFactory
{
    private Converter $converter;
    private \DateTime $utc;

    public function __construct(Converter $converter, \DateTime $utc)
    {
        $this->converter = $converter;
        $this->utc = $utc;
    }

    public function getDate(): string
    {
        return $this->converter->getDate($this->utc);
    }

    public function getTime(): string
    {
        return $this->converter->getDate($this->utc);
    }
}