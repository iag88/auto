<?php

namespace App\DataFixtures;

use App\Entity\Model;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ModelFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $file = file_get_contents('var/fixtures/models.json');

        $models = json_decode($file);
        foreach ($models as $model) {
            $modelEntity = new Model();
            $modelEntity->setCode($model->code);
            $modelEntity->setDescription($model->description);
            $modelEntity->setType($model->type);
            $modelEntity->setGroup($model->group);
            $manager->persist($modelEntity);
        }

        $manager->flush();
    }
}
