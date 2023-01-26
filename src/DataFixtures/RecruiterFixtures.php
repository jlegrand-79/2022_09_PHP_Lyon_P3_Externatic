<?php

namespace App\DataFixtures;

use App\Entity\Recruiter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecruiterFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $recruiters = [
            [
                'user' => 'user_1',
                'firstname' => 'Bruce',
                'lastname' => 'Wayne',
                'phone' => '0470948372',
                'address' => "1 rue du Manoir",
                'addressComplement' => "BatCave",
                'postalCode' => '69039',
                'city' => 'Gotham City',
                'partner' => 'partner_1',
                'position' => 'Batman'
            ],
            [
                'user' => 'user_2',
                'firstname' => 'Lucius',
                'lastname' => 'Fox',
                'phone' => '0470384958',
                'address' => "1 rue du Manoir",
                'postalCode' => '69039',
                'city' => 'Gotham City',
                'partner' => 'partner_1',
                'position' => 'CEO'
            ],
            [
                'user' => 'user_3',
                'firstname' => 'Tony',
                'lastname' => 'Stark',
                'phone' => '0378392038',
                'address' => "1 rue du batiment Stark",
                'addressComplement' => "Bureau principal",
                'postalCode' => '76004',
                'city' => 'New York',
                'partner' => 'partner_0',
                'position' => 'Iron Man'
            ],
            [
                'user' => 'user_4',
                'firstname' => 'Virginia',
                'lastname' => 'Potts',
                'phone' => '0326473859',
                'address' => "1 rue du batiment Stark",
                'postalCode' => '76004',
                'city' => 'New York',
                'partner' => 'partner_0',
                'position' => 'CEO'
            ],
            [
                'user' => 'user_5',
                'firstname' => 'Anna',
                'lastname' => 'Stépanoff',
                'phone' => '0689564578',
                'address' => "1 rue de la wild",
                'postalCode' => '75000',
                'city' => 'Paris',
                'partner' => 'partner_2',
                'position' => 'CEO'
            ],
            [
                'user' => 'user_6',
                'firstname' => 'Romain',
                'lastname' => 'Coeur',
                'phone' => '0648571537',
                'address' => "18 rue du PHP",
                'postalCode' => '75000',
                'city' => 'Paris',
                'partner' => 'partner_2',
                'position' => 'CEO Bis'
            ],
            [
                'user' => 'user_7',
                'firstname' => 'Gérard',
                'lastname' => 'Dupont',
                'phone' => '0479076309',
                'address' => "Immeuble Identity – 7",
                'postalCode' => '35000',
                'city' => 'Rennes',
                'partner' => 'partner_3',
                'position' => 'CEO'
            ],
            [
                'user' => 'user_8',
                'firstname' => 'Julie',
                'lastname' => 'Brouillard',
                'phone' => '0723458912',
                'address' => "6 Quai de Paludate",
                'postalCode' => '33800',
                'city' => 'Bordeaux',
                'partner' => 'partner_3',
                'position' => 'CEO'
            ],
        ];

        foreach ($recruiters as $key => $recruiter) {
            $newRecruiter = new Recruiter();
            $newRecruiter->setFirstname($recruiter['firstname']);
            $newRecruiter->setLastname($recruiter['lastname']);
            $newRecruiter->setPhone($recruiter['phone']);
            $newRecruiter->setAddress($recruiter['address']);
            if (isset($recruiter['addressComplement'])) {
                $newRecruiter->setAddressComplement($recruiter['addressComplement']);
            }
            $newRecruiter->setCity($recruiter['city']);
            $newRecruiter->setPostalCode($recruiter['postalCode']);
            $newRecruiter->setPartner($this->getReference($recruiter['partner']));
            $newRecruiter->setUser($this->getReference($recruiter['user']));
            $newRecruiter->setPosition($recruiter['position']);
            $manager->persist($newRecruiter);
            $this->addReference('recruiter_' . $key, $newRecruiter);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            PartnerFixtures::class,
        ];
    }
}
