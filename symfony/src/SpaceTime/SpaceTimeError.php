<?php

namespace App\SpaceTime;

use App\SpaceTime\ErrorInterface;

class SpaceTimeError implements SpaceTimeErrorInterface
{
    public static function getErrorOutputAsJsonString(\Exception $e): string
    {
        $output = [
            'error' => $e->getMessage(),
        ];

        return json_encode($output);
    }
}
