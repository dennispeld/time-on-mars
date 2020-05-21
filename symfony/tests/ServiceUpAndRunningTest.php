<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ServiceUpAndRunningTest extends WebTestCase
{
    public function testServiceIsAlive() 
    {
        $client = $this->createClient();
        $client->request('GET', '/adapter/spacedatetime/i-am-alive');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}