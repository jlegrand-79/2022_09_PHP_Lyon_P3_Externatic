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
