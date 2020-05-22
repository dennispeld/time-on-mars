<?php

declare(strict_types = 1);

namespace App\MarsTime;

use App\SpaceTime\ConverterInterface;

/**
 * Convert UTC DateTime on Earth to MSD and MTC on Mars
 * @see https://www.giss.nasa.gov/tools/mars24/help/algorithm.html
 * @see https://en.wikipedia.org/wiki/Timekeeping_on_Mars#Formulas_to_compute_MSD_and_MTC
 * @see http://jtauber.github.io/mars-clock/
 */
final class MartianDateTimeConverter implements ConverterInterface
{
    const SECONDS_IN_DAY = 86400;
    const JULIAN_DATE_AT_UNIX_EPOCH = 2440587.5;
    const LEAP_SECONDS = 37;
    const MARTIAN_DAY_TO_EARTH_DAY_RATIO = 1.0274912517;

    private \DateTime $utc;
    private $marsSolDate = null;
    
    public function __construct(\DateTime $utc)
    {
        $this->utc = $utc;
    }
    
    /**
     * Calculates and retrieves Mars Sol Date (MSD)
     */
    public function getDate(): string
    {
        $julianDateUniversalTime = self::JULIAN_DATE_AT_UNIX_EPOCH + ($this->utc->getTimestamp() / self::SECONDS_IN_DAY);
        $julianDateTerrestrialTime = $julianDateUniversalTime + (self::LEAP_SECONDS + 32.184) / self::SECONDS_IN_DAY;
        $marsSolDate = ($julianDateTerrestrialTime - 2405522.0028779) / self::MARTIAN_DAY_TO_EARTH_DAY_RATIO;

        $this->marsSolDate = $marsSolDate;

        return number_format($marsSolDate, 5, '.', '');
    }

    /**
     * Calculates and retrieves Martian Coordinated Time (MTC)
     */
    public function getTime(): string
    {
        // To avoid calling getDate() method twice, I can utilize an existing result
        if (!$this->marsSolDate) {
            $this->marsSolDate = $this->getDate();
        }

        $martianCoordinatedTime = round(fmod(($this->marsSolDate * 24), 24) * 3600);

        return gmdate('H:i:s', (int) $martianCoordinatedTime);
    }
}
