<?php

namespace App\DataFixtures;

use App\Entity\Field;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class FieldFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $fields = ['Développement', 'Data'];

        foreach ($fields as $field) {
            $newField = new Field();
            $newField->setName($field);
            $manager->persist($newField);
            $this->addReference($field, $newField);
        }
        $manager->flush();
    }
}
