<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Candidacy;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CandidacyFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $candidacies = [
            [
                'candidate' => 'candidate_0',
                'offer' => 'offer_0',
                'date' => new DateTime('2023/01/16'),
                'status' => 'Nouvelle'
            ],
            [
                'candidate' => 'candidate_1',
                'offer' => 'offer_0',
                'date' => new DateTime('2023/01/13'),
                'status' => 'Refusée'
            ],
            [
                'candidate' => 'candidate_2',
                'offer' => 'offer_1',
                'date' => new DateTime('2023/01/04'),
                'status' => 'Acceptée'
            ],
            [
                'candidate' => 'candidate_3',
                'offer' => 'offer_5',
                'date' => new DateTime('2023/01/20'),
                'status' => 'Acceptée'
            ],
            [
                'candidate' => 'candidate_4',
                'offer' => 'offer_5',
                'date' => new DateTime('2023/01/23'),
                'status' => 'Refusée'
            ],
            [
                'candidate' => 'candidate_6',
                'offer' => 'offer_5',
                'date' => new DateTime('2023/01/25'),
                'status' => 'Refusée'
            ]
        ];

        foreach ($candidacies as $key => $candidacy) {
            $newCandidacy = new Candidacy();
            $newCandidacy->setCandidate($this->getReference($candidacy['candidate']));
            $newCandidacy->setOffer($this->getReference($candidacy['offer']));
            $newCandidacy->setCandidacyDate($candidacy['date']);
            $newCandidacy->setStatus($this->getReference($candidacy['status']));
            $manager->persist($newCandidacy);
            $this->addReference('candidacy_' . $key, $newCandidacy);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CandidateFixtures::class,
            OfferFixtures::class,
            StatusFixtures::class
        ];
    }
}
