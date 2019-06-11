<?php

namespace App\DataFixtures;

use App\Entity\VehicleType;
use Doctrine\Common\Persistence\ObjectManager;

class VehicleTypeFixtures extends AbstractFixture
{
    const VEHICLE_FIXTURE = 'fixtures/vehicle_types.json';

    public function load(ObjectManager $manager)
    {
        $vehicleTypes = $this->getFixturesData(self::VEHICLE_FIXTURE);
        foreach ($vehicleTypes as $vehicle) {
            $vehicleTypeEntity = (new VehicleType())
                ->setCode($vehicle->code)
                ->setDescription($vehicle->description);

            $manager->persist($vehicleTypeEntity);
        }

        $manager->flush();
    }
}
