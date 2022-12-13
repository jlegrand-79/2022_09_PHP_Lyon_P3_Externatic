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

        foreach ($fields as $fieldName) {
            $field = new Field();
            $field->setName($fieldName);
            $manager->persist($field);
            $this->addReference($fieldName, $field);
        }
        $manager->flush();
    }
}
