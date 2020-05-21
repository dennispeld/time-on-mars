<?php

namespace App\SpaceTime;

interface ConverterInterface
{
    public function getDate(\DateTime $utc): string;
    public function getTime(\DateTime $utc): string;
}