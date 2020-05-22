<?php

declare(strict_types = 1);

namespace App\SpaceTime;

interface FormatterInterface
{
    public function getFormattedOutputAsJsonString(): string;
}
