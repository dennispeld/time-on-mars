<?php

declare(strict_types = 1);

namespace App\MarsTime;

use App\SpaceTime\ConverterInterface;

class MartianDateTimeConverter implements ConverterInterface
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