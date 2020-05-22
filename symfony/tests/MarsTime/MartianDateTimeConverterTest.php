<?php

namespace App\Tests\MarsTime;

use App\EarthTime\UTC;
use App\MarsTime\MartianDateTimeConverter;
use PHPUnit\Framework\TestCase;

class MartianDateTimeConverterTest extends TestCase
{
    public function testCalculationOfMarsSolDay()
    {
        $dateWithTime = '24.06.1983 17:24:38';
        $utc = UTC::getUTC($dateWithTime);
        $converter = new MartianDateTimeConverter($utc);
        $this->assertEquals('38918.31030', $converter->getDate());

        $dateWithoutTime = '16-05-2003';
        $utc = UTC::getUTC($dateWithoutTime);
        $converter = new MartianDateTimeConverter($utc);
        $this->assertEquals('45989.19732', $converter->getDate());

        $timestamp = '1590160721';
        $utc = UTC::getUTC($timestamp);
        $converter = new MartianDateTimeConverter($utc);
        $this->assertEquals('52039.50477', $converter->getDate());
    }

    public function testCalculationOfMartianCoordinatedTime()
    {
        $dateWithTime = '24.06.1983 17:24:38';
        $utc = UTC::getUTC($dateWithTime);
        $converter = new MartianDateTimeConverter($utc);
        $this->assertEquals('07:26:50', $converter->getTime());

        $dateWithoutTime = '16-05-2003';
        $utc = UTC::getUTC($dateWithoutTime);
        $converter = new MartianDateTimeConverter($utc);
        $this->assertEquals('04:44:08', $converter->getTime());

        $timestamp = '1590160721';
        $utc = UTC::getUTC($timestamp);
        $converter = new MartianDateTimeConverter($utc);
        $this->assertEquals('12:06:52', $converter->getTime());
    }
}
