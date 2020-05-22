<?php

declare(strict_types = 1);

namespace App\SpaceTime;

use App\SpaceTime\SpaceTimeErrorInterface;

class SpaceTimeError implements SpaceTimeErrorInterface
{
    /**
     * Retrieve an exception message as Json string
     */
    public static function getErrorOutputAsJsonString(\Exception $e): string
    {
        $output = [
            'error' => $e->getMessage(),
        ];

        return json_encode($output);
    }
}
