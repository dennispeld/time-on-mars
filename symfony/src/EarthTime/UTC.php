<?php

declare(strict_types = 1);

namespace App\EarthTime;

class UTC
{
    /**
     * Convert and retrieve DateTime object from string
     */
    public static function getUTC(string $dateTimeOnEarth = null): \DateTime
    {
        // if no datetime was specified, set it to current datetime
        if (!$dateTimeOnEarth) {
            $dateTimeOnEarth = 'now';
        }

        try {
            if (!self::isTimestamp($dateTimeOnEarth)) {
                // accept date in certain formats (for example, 24.06.1983 or 24-06-1983)
                $utc = new \DateTime($dateTimeOnEarth);
            } else {
                // accept UNIX timestamps (for eaxmple, 1590141800)
                $utc = new \DateTime();
                $utc->setTimestamp((int) $dateTimeOnEarth);
            }
            
            $utc->setTimezone(new \DateTimeZone('UTC'));
        } catch (\Exception $e) {
            throw new \Exception('The datetime format is wrong.');
        }

        return $utc;
    }

    /**
     * Check if the given string is a valid timestamp
     */
    public static function isTimestamp(string $dateTimeOnEarth)
    {
        return ((string) (int) $dateTimeOnEarth === $dateTimeOnEarth)
            && ($dateTimeOnEarth <= PHP_INT_MAX)
            && ($dateTimeOnEarth >= ~PHP_INT_MAX);
    }
}
