<?php

namespace App\SpaceTime;

interface SpaceTimeErrorInterface
{
    public static function getErrorOutputAsJsonString(\Exception $e): string;
}
