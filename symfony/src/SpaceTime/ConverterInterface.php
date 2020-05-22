<?php

namespace App\SpaceTime;

interface ConverterInterface
{
    public function getDate(): string;
    public function getTime(): string;
}