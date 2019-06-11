<?php

namespace App\DataFixtures;

use App\Entity\Make;
use App\Entity\VehicleType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

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

    /**
     * @return array
     */
    public function getVehicles(ObjectManager $manager): array
    {
        $vehicleList = $manager
            ->getRepository(VehicleType::class)
            ->findAll();

        $vehicleTypes = [];
        foreach ($vehicleList as $val) {
            $vehicleTypes[$val->getCode()] = $val;
        }

        return $vehicleTypes;
    }


    /**
     * @return array
     */
    public function getMakes(ObjectManager $manager): array
    {
        $makeList = $manager
            ->getRepository(Make::class)
            ->findAll();

        $makes = [];
        foreach ($makeList as $val) {
            $makes[$val->getType()->getCode()][$val->getCode()] = $val;
        }

        return $makes;
    }
}
