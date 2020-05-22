<?php

namespace App\Tests\SpaceTime;

use App\EarthTime\UTC;
use App\MarsTime\MartianDateTimeConverter;
use App\SpaceTime\ConverterFactory;
use PHPUnit\Framework\TestCase;

class ConverterFactoryTest extends TestCase
{
    public function testFactoryRetrievesDateByConverter()
    {
        $timestamp = '1590160721';
        $utc = UTC::getUTC($timestamp);
        $converter = new MartianDateTimeConverter($utc);
        $factory = new ConverterFactory($converter);
        $this->assertEquals('52039.50477', $factory->getDate());
    }

    public function testFactoryRetrievesTimeByConverter()
    {
        $timestamp = '1590160721';
        $utc = UTC::getUTC($timestamp);
        $converter = new MartianDateTimeConverter($utc);
        $factory = new ConverterFactory($converter);
        $this->assertEquals('12:06:52', $factory->getTime());
    }
}
