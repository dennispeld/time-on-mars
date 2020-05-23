<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ServiceStatusControllerTest extends WebTestCase
{
    /**
     * Test if a service is alive
     */
    public function testServiceIsAlive()
    {
        $client = $this->createClient();
        $client->request('GET', '/service/status-check');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
