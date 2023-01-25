<?php

namespace App\DataFixtures;

use App\Entity\Status;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class StatusFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $statuses = ['Nouvelle', 'Refusée', 'Acceptée'];

        foreach ($statuses as $status) {
            $newStatus = new Status();
            $newStatus->setStatus($status);
            $manager->persist($newStatus);
            $this->addReference($status, $newStatus);
        }

        $manager->flush();
    }
}
