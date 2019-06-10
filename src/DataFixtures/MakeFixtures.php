<?php

namespace App\DataFixtures;

use App\Entity\Make;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MakeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $file = file_get_contents('var/fixtures/makes.json');

        $makes = json_decode($file);
        foreach ($makes as $make) {
            $makeEntity = new Make();
            $makeEntity->setCode($make->code);
            $makeEntity->setDescription($make->description);
            $makeEntity->setType($make->type);
            $manager->persist($makeEntity);
        }

        $manager->flush();
    }
}
