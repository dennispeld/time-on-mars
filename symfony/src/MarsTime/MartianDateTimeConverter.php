<?php

declare(strict_types = 1);

namespace App\MarsTime;

use App\SpaceTime\Converter;

class MartianDateTimeConverter implements Converter
{
    public function getDate(\DateTime $utc): string
    {
        return '1234.5678';
    }

    public function getTime(\DateTime $utc): string
    {
        return '12:34:56';
    }
}