<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OfferFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $offers = [
            [
                'contract' => 'contract_CDI',
                'recruiter' => 'recruiter_1',
                'workfield' => 'Data',
                'title' => 'Développeur PHP',
                'description' => "Une super offre d'embauche",
                'address' => '1 rue des rivières',
            ],
            [
                'contract' => 'contract_CDD',
                'recruiter' => 'recruiter_2',
                'workfield' => 'Data',
                'title' => 'Développeur Java',
                'description' => "Une super offre d'embauche",
                'address' => '1 rue des rivières',
            ],
            [
                'contract' => 'contract_CDD',
                'recruiter' => 'recruiter_1',
                'workfield' => 'Data',
                'title' => 'Développeur Pyhton',
                'description' => "Une super offre d'embauche",
                'address' => '1 rue des rivières',
            ],
            [
                'contract' => 'contract_CDI',
                'recruiter' => 'recruiter_2',
                'workfield' => 'Développement',
                'title' => 'Développeur Ruby',
                'description' => "Une super offre d'embauche",
                'address' => '1 rue des rivières',
            ],
            [
                'contract' => 'contract_CDI',
                'recruiter' => 'recruiter_1',
                'workfield' => 'Data',
                'title' => 'Développeur Javascript',
                'description' => "Une super offre d'embauche",
                'address' => '1 rue des rivières',
            ],
        ];

        foreach ($offers as $key => $offer) {
            $newOffer = new Offer();
            $newOffer->setTitle($offer['title']);
            $newOffer->setDescription($offer['description']);
            $newOffer->setAddress($offer['address']);
            $newOffer->setRecruiter($this->getReference($offer['recruiter']));
            $newOffer->setContract($this->getReference($offer['contract']));
            $newOffer->setWorkField($this->getReference($offer['workfield']));
            $manager->persist($newOffer);
            $this->addReference('offer_' . $key, $newOffer);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ContractFixtures::class,
            PartnerFixtures::class,
            WorkFieldFixtures::class,
            RecruiterFixtures::class,
        ];
    }
}
