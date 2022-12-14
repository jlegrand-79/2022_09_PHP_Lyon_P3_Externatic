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
                'user' => 'user_0',
                'firstname' => 'Bruce',
                'lastname' => 'Wayne',
                'phone' => '555-0100',
                'address' => 'Gotham City',
                'partner' => 'partner_0',
            ],
            [
                'user' => 'user_1',
                'firstname' => 'Lucius',
                'lastname' => 'Fox',
                'phone' => '555-0101',
                'address' => 'Gotham City',
                'partner' => 'partner_0',
            ],
            [
                'user' => 'user_2',
                'firstname' => 'Tony',
                'lastname' => 'Stark',
                'phone' => '555-0200',
                'address' => 'New York City, New York',
                'partner' => 'partner_1',
            ],
            [
                'user' => 'user_3',
                'firstname' => 'Virginia',
                'lastname' => 'Potts',
                'phone' => '555-0201',
                'address' => 'Los Angeles, California',
                'partner' => 'partner_1',
            ],
        ];

        foreach ($recruiters as $key => $value) {

            $recruiter = new Recruiter();
            $recruiter->setFirstname($recruiters[$key]['firstname']);
            $recruiter->setLastname($recruiters[$key]['lastname']);
            $recruiter->setPhone($recruiters[$key]['phone']);
            $recruiter->setAddress($recruiters[$key]['address']);
            $recruiter->setPartner($this->getReference($recruiters[$key]['partner']));
            $recruiter->setUser($this->getReference($recruiters[$key]['user']));
            $manager->persist($recruiter);
            $this->addReference('recruiter_' . $key, $recruiter);
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
