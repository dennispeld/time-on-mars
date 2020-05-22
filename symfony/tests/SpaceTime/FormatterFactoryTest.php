<?php

namespace App\Tests\SpaceTime;

use App\EarthTime\UTC;
use App\MarsTime\MartianDateTimeConverter;
use App\MarsTime\MartianDateTimeFormatter;
use App\SpaceTime\ConverterFactory;
use App\SpaceTime\FormatterFactory;
use PHPUnit\Framework\TestCase;

class FormatterFactoryTest extends TestCase
{
    /**
     * Test if formatter factory retrieves the expected data as Json string
     */
    public function testFormatterOutput()
    {
        $timestamp = '1590141800';
        $utc = UTC::getUTC($timestamp);
        $converter = new MartianDateTimeConverter($utc);
        $converterFactory = new ConverterFactory($converter);
        $formatter = new MartianDateTimeFormatter($converterFactory);
        $formatterFactory = new FormatterFactory($formatter);
        $actualOutput = $formatterFactory->getFormattedOutputAsJsonString();
        $this->assertJson($actualOutput);
        $this->assertStringContainsString('mars_sol_date', $actualOutput);
        $this->assertStringContainsString('martian_coordinated_time', $actualOutput);
    }
}
