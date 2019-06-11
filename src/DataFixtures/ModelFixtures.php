<?php

namespace App\DataFixtures;

use App\Entity\Model;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ModelFixtures extends AbstractFixture implements DependentFixtureInterface
{
    const MODEL_FIXTURE = 'fixtures/models.json';

    public function load(ObjectManager $manager)
    {
        //Get all vehicles and makes
        $vehicleType = $this->getVehicles($manager);
        $makes = $this->getMakes($manager);

        $models = $this->getFixturesData(self::MODEL_FIXTURE);
        foreach ($models as $model) {
            if (isset($vehicleType[$model['type']]) && isset($makes[$model['type']][$model['group']])) {
                $modelEntity = (new Model())
                    ->setCode($model['code'])
                    ->setDescription($model['description'])
                    ->setType($vehicleType[$model['type']])
                    ->setGroups($makes[$model['type']][$model['group']]);

                $manager->persist($modelEntity);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            MakeFixtures::class,
        );
    }
}
