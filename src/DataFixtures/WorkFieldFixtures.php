<?php

namespace App\DataFixtures;

use App\Entity\WorkField;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class WorkFieldFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $fields = ['Développement', 'Data'];

        foreach ($fields as $field) {
            $workField = new WorkField();
            $workField->setName($field);
            $manager->persist($workField);
            $this->addReference($field, $workField);
        }
        $manager->flush();
    }
}
