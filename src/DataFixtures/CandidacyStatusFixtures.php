<?php

namespace App\DataFixtures;

use App\Entity\CandidacyStatus;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CandidacyStatusFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $statuses = ['New', 'Forwarded', 'Declined'];

        foreach ($statuses as $status) {
            $newStatus = new CandidacyStatus();
            $newStatus->setStatus($status);
            $manager->persist($newStatus);
            $this->addReference($status, $newStatus);
        }

        $manager->flush();
    }
}
