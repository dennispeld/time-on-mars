<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StatusCheckTest extends WebTestCase
{
    public function testServiceIsAlive() 
    {
        $client = $this->createClient();
        $client->request('GET', '/adapter/status-check');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}