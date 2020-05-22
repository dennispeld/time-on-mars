<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SpaceTimeControllerTest extends WebTestCase
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

    /**
     * Test if UTC DateTime is converted to MSD and MTC
     */
    public function testConvertUTCToMartianDateTime()
    {
        $client = $this->createClient();
        $client->request('GET', '/api/v1/spacetime/convert/01.01.2020');

        $expectedJSonString = '{"mars_sol_date":"51900.68318","martian_coordinated_time":"16:23:47"}';

        $this->assertEquals($expectedJSonString, $client->getResponse()->getContent());
    }

    /**
     * Test if UNIX timestamp is converted to MSD and MTC
     */
    public function testConvertTimestampToMartianDateTime()
    {
        $client = $this->createClient();
        $client->request('GET', '/api/v1/spacetime/convert/1590141800');

        $expectedJSonString = '{"mars_sol_date":"52039.29164","martian_coordinated_time":"06:59:58"}';

        $this->assertEquals($expectedJSonString, $client->getResponse()->getContent());
    }

    /**
     * Test if a false date format retrieves a BAD REQUEST status
     */
    public function testBadRequest()
    {
        $client = $this->createClient();
        $client->request('GET', '/api/v1/spacetime/convert/dsgsdfgdfgdffgdfg');

        $this->assertStringContainsString('error', $client->getResponse()->getContent());
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }
}
