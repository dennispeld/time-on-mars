<?php

namespace App\Tests\SpaceTime;

use App\SpaceTime\SpaceTimeError;
use PHPUnit\Framework\TestCase;

class SpaceTimeErrorTest extends TestCase
{
    /**
     * Test if exception is retrieves as json string
     */
    public function testErrorOutputAsJsonString()
    {
        $exception = new \Exception('Exceptional exception', 400);
        $error = SpaceTimeError::getErrorOutputAsJsonString($exception);
        $this->assertJson($error);
        $this->assertStringContainsString('error', $error);
    }
}
