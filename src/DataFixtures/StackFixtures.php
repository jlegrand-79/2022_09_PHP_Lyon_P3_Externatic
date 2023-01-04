<?php

namespace App\DataFixtures;

use App\Entity\Stack;
use App\DataFixtures\WorkFieldFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class StackFixtures extends Fixture implements DependentFixtureInterface
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
            $newStack->addWorkField($this->getReference($stack[1]));
            if (isset($stack[2])) {
                $newStack->addWorkField($this->getReference($stack[2]));
            }
            $manager->persist($newStack);
            $this->addReference($stack[0] . "_" . $stack[1], $newStack);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            WorkFieldFixtures::class,
        ];
    }
}
