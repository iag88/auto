<?php

namespace App\DataFixtures;

use App\Entity\Model;
use Doctrine\Common\Persistence\ObjectManager;

class ModelFixtures extends AbstractFixture
{
    const MODEL_FIXTURE = 'fixtures/models.json';

    public function load(ObjectManager $manager)
    {
        $models = $this->getFixturesData(self::MODEL_FIXTURE);
        foreach ($models as $model) {
            $modelEntity = (new Model())
                ->setCode($model['code'])
                ->setDescription($model['description'])
                ->setType($model['type'])
                ->setGroup($model['group']);

            $manager->persist($modelEntity);
        }

        $manager->flush();
    }
}
