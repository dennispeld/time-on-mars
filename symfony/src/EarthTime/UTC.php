<?php

declare(strict_types = 1);

namespace App\EarthTime;

class UTC
{
    public function build(string $dateTimeOnEarth = null): \DateTime
    {
        if (!$dateTimeOnEarth) {
            $dateTimeOnEarth = 'now';
        }

        $date = new \DateTime($dateTimeOnEarth);
        $date->setTimezone(new \DateTimeZone('UTC'));

        return $date;
    }
}