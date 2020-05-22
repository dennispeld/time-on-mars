<?php

namespace App\SpaceTime;

interface FormatterInterface
{
    public function getFormattedOutputAsJsonString(): string;
}
