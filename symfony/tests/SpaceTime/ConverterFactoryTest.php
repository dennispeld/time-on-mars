<?php

namespace App\Tests\SpaceTime;

use App\EarthTime\UTC;
use App\MarsTime\MartianDateTimeConverter;
use App\SpaceTime\ConverterFactory;
use PHPUnit\Framework\TestCase;

class ConverterFactoryTest extends TestCase
{
    /**
     * Test if given date in UTC is converted to MSD as expexted using factory
     */
    public function testFactoryRetrievesDateByConverter()
    {
        $timestamp = '1590160721';
        $utc = UTC::getUTC($timestamp);
        $converter = new MartianDateTimeConverter($utc);
        $factory = new ConverterFactory($converter);
        $this->assertEquals('52039.50477', $factory->getDate());
    }

    /**
     * Test if given date in UTC is converted to MTC as expected using factory
     */
    public function testFactoryRetrievesTimeByConverter()
    {
        $timestamp = '1590160721';
        $utc = UTC::getUTC($timestamp);
        $converter = new MartianDateTimeConverter($utc);
        $factory = new ConverterFactory($converter);
        $this->assertEquals('12:06:52', $factory->getTime());
    }
}
