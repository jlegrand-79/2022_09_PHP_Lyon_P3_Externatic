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

            foreach ($stacks as $stack) {
                $newStack = new Stack();
                $newStack->setName($stack[0]);
                $newStack->addField($this->getReference($stack[1]));
                if (isset($stack[2])) {
                    $newStack->addField($this->getReference($stack[2]));
                }
                $manager->persist($newStack);
                $this->addReference($stack[0] . "_" . $stack[1], $newStack);
            }
            $manager->flush();
    }
}
