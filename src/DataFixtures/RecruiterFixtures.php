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
                'phone' => '555-0100',
                'address' => 'Gotham City',
                'partner' => 'partner_1',
            ],
            [
                'user' => 'user_2',
                'firstname' => 'Lucius',
                'lastname' => 'Fox',
                'phone' => '555-0101',
                'address' => 'Gotham City',
                'partner' => 'partner_1',
            ],
            [
                'user' => 'user_3',
                'firstname' => 'Tony',
                'lastname' => 'Stark',
                'phone' => '555-0200',
                'address' => 'New York City, New York',
                'partner' => 'partner_0',
            ],
            [
                'user' => 'user_4',
                'firstname' => 'Virginia',
                'lastname' => 'Potts',
                'phone' => '555-0201',
                'address' => 'Los Angeles, California',
                'partner' => 'partner_0',
            ],
        ];

        foreach ($recruiters as $key => $recruiter) {
            $newRecruiter = new Recruiter();
            $newRecruiter->setFirstname($recruiter['firstname']);
            $newRecruiter->setLastname($recruiter['lastname']);
            $newRecruiter->setPhone($recruiter['phone']);
            $newRecruiter->setAddress($recruiter['address']);
            $newRecruiter->setPartner($this->getReference($recruiter['partner']));
            $newRecruiter->setUser($this->getReference($recruiter['user']));
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
