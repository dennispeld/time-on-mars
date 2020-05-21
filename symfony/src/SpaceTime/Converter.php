<?php

namespace App\SpaceTime;

class Converter
{
    private ConverterInterface $converter;
    private \DateTime $utc;

    public function __construct(ConverterInterface $converter, \DateTime $utc)
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
        return $this->converter->getTime($this->utc);
    }
}