<?php

namespace App\Test\Controller;

use PHPUnit\Framework\TestCase;

class MakelControllerTest extends TestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/makes/C');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
