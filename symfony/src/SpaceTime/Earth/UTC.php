<?php

namespace App\SpaceTime\Earth;

class UTC 
{
    public function convert(string $dateTimeOnEarth = null): \DateTime
    {
        if (!$dateTimeOnEarth) {
            $dateTimeOnEarth = 'now';
        }

        $date = new \DateTime($dateTimeOnEarth);
        $date->setTimezone(new \DateTimeZone('UTC'));

        return $date;
    }
}