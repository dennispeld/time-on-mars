<?php

namespace App\Tests\MarsTime;

use App\EarthTime\UTC;
use App\MarsTime\MartianDateTimeConverter;
use App\MarsTime\MartianDateTimeFormatter;
use App\SpaceTime\ConverterFactory;
use PHPUnit\Framework\TestCase;

class MartianDateTimeFormatterTest extends TestCase
{
    /**
     * Test if formatter retrieves the expected data as Json string
     */
    public function testOutputFormatAsJsonString()
    {
        $timestamp = '1590141800';
        $utc = UTC::getUTC($timestamp);
        $converter = new MartianDateTimeConverter($utc);
        $converterFactory = new ConverterFactory($converter);
        $formatter = new MartianDateTimeFormatter($converterFactory);
        $actualOutput = $formatter->getFormattedOutputAsJsonString();
        $this->assertJson($actualOutput);
        $this->assertStringContainsString('mars_sol_date', $actualOutput);
        $this->assertStringContainsString('martian_coordinated_time', $actualOutput);
    }
}
