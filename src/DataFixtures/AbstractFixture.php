<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;

abstract class AbstractFixture extends Fixture
{
    /**
     * @param string $filename
     * @return array
     */
    protected function getFixturesData(string $filename): array
    {
        return json_decode(file_get_contents($filename), true);
    }
}
