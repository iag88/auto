<?php

namespace App\DataFixtures;

use App\Entity\Make;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MakeFixtures extends AbstractFixture implements DependentFixtureInterface
{
    const MAKE_FIXTURE = 'fixtures/makes.json';

    public function load(ObjectManager $manager)
    {
        //Get all vehicles
        $vehicleType = $this->getVehicles($manager);

        $makes = $this->getFixturesData(self::MAKE_FIXTURE);
        foreach ($makes as $make) {
            if (isset($vehicleType[$make['type']])) {
                $makeEntity = (new Make())
                    ->setCode($make['code'])
                    ->setDescription($make['description'])
                    ->setType($vehicleType[$make['type']]);

                $manager->persist($makeEntity);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            VehicleTypeFixtures::class,
        );
    }
}
