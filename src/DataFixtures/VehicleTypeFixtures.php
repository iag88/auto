<?php

namespace App\DataFixtures;

use App\Entity\VehicleType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class VehicleTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $file = file_get_contents('var/fixtures/vehicle_types.json');

        $vehicle_types = json_decode($file);
        foreach ($vehicle_types as $vehicle) {
            $vehicleTypeEntity = new VehicleType();
            $vehicleTypeEntity->setCode($vehicle->code);
            $vehicleTypeEntity->setDescription($vehicle->description);
            $manager->persist($vehicleTypeEntity);
        }

        $manager->flush();
    }
}
