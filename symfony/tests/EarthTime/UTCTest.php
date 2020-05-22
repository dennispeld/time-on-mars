<?php

namespace App\Tests\EarthTime;

use App\EarthTime\UTC;
use PHPUnit\Framework\TestCase;

class UTCTest extends TestCase
{
    public function testConvertStringToDateTime()
    {
        $timestamp = '1590141800';
        $utc = new \DateTime();
        $utc->setTimestamp((int) $timestamp);
        $this->assertEquals($utc, UTC::getUTC($timestamp));

        $date = '24.06.1983';
        $this->assertEquals(new \DateTime($date), UTC::getUTC($date));
    }

    public function testTimestamp()
    {
        $timestamp = '1590141800';
        $this->assertTrue(UTC::isTimestamp($timestamp));

        $notTimestamp = '24.06.1983';
        $this->assertFalse(UTC::isTimestamp($notTimestamp));

        $notDate = 'porque la vida es muy dura?';
        $this->assertFalse(UTC::isTimestamp($notDate));
    }
}
