<?php

namespace App\DataFixtures;

use App\Entity\Stack;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class StackFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
            $stacks = [
                ['PHP', 'Développement'],
                ['Javascript', 'Développement'],
                ['Java', 'Développement'],
                ['mySQL', 'Développement', 'Data'],
                ['Python', 'Data', 'Développement']
            ];

            foreach ($stacks as $key) {
                $stack = new Stack();
                $stack->setName($key[0]);
                $stack->addField($this->getReference($key[1]));
                if (isset($key[2])) {
                    $stack->addField($this->getReference($key[2]));
                }
                $manager->persist($stack);
                $this->addReference($key[0] . "_" . $key[1], $stack);
            }
            $manager->flush();
    }
}
