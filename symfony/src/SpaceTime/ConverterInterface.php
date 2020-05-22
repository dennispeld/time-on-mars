<?php

declare(strict_types = 1);

namespace App\SpaceTime;

interface ConverterInterface
{
    public function getDate(): string;
    public function getTime(): string;
}
