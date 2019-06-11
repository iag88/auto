<?php

namespace App\DataFixtures;

use App\Entity\Make;
use Doctrine\Common\Persistence\ObjectManager;

class MakeFixtures extends AbstractFixture
{
    const MAKE_FIXTURE = 'fixtures/makes.json';

    public function load(ObjectManager $manager)
    {
        $makes = $this->getFixturesData(self::MAKE_FIXTURE);
        foreach ($makes as $make) {
            $makeEntity = (new Make())
                ->setCode($make['code'])
                ->setDescription($make['description'])
                ->setType($make['type']);

            $manager->persist($makeEntity);
        }

        $manager->flush();
    }
}
