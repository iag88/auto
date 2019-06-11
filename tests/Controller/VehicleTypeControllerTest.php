<?php

namespace App\Test\Controller;

use PHPUnit\Framework\TestCase;

class VehicleTypeControllerTest extends TestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
