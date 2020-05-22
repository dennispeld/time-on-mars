<?php

declare(strict_types = 1);

namespace App\SpaceTime;

interface SpaceTimeErrorInterface
{
    public static function getErrorOutputAsJsonString(\Exception $e): string;
}
