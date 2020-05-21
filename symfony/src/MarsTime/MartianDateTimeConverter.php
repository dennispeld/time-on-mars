<?php

declare(strict_types = 1);

namespace App\MarsTime;

use App\SpaceTime\ConverterInterface;

final class MartianDateTimeConverter implements ConverterInterface
{
    const SECONDS_IN_DAY = 86400;
    const JULIAN_DATE_AT_UNIX_EPOCH = 2440587.5;
    const LEAP_SECONDS = 37;
    const MARTIAN_DAY_TO_EARTH_DAY_RATIO = 1.0274912517;

    private float $marsSolDate;
    
    /**
     * Retrieves Mars Sol Date (MSD)
     */
    public function getDate(\DateTime $utc): string
    {
        $julianDateUniversalTime = self::JULIAN_DATE_AT_UNIX_EPOCH + ($utc->getTimestamp() / self::SECONDS_IN_DAY);
        $julianDateTerrestrialTime = $julianDateUniversalTime + (self::LEAP_SECONDS + 32.184) / self::SECONDS_IN_DAY;
        $marsSolDate = ($julianDateTerrestrialTime - 2405522.0028779) / self::MARTIAN_DAY_TO_EARTH_DAY_RATIO;

        $this->marsSolDate = $marsSolDate;

        return number_format($marsSolDate, 5, '.', '');
    }

    public function getTime(\DateTime $utc): string
    {
        if (!$this->marsSolDate) {
            $this->marsSolDate = $this->getDate($utc);
        }

        $martianCoordinatedTime = round(fmod(($this->marsSolDate * 24), 24) * 3600);

        return gmdate('H:i:s', (int) $martianCoordinatedTime);
    }
}