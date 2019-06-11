<?php

namespace App\Test\Controller;

use PHPUnit\Framework\TestCase;

class ModelControllerTest extends TestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/models/C/BMW');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
