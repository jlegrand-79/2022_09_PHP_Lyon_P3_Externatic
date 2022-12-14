<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $users = [
            [
                'email' => 'bruce@wayne-entreprises.com',
                'password' => 'password',
                'role' => 'role_recruiter',
            ],
            [
                'email' => 'lucius@wayne-entreprises.com',
                'password' => 'password',
                'role' => 'role_recruiter',
            ],
            [
                'email' => 'tony@stark-industries.com',
                'password' => 'password',
                'role' => 'role_recruiter',
            ],
            [
                'email' => 'virginia@stark-industries.com',
                'password' => 'password',
                'role' => 'role_recruiter',
            ],
        ];

        foreach ($users as $key => $value) {

            $user = new User();
            $user->setEmail($users[$key]['email']);
            $user->setPassword($users[$key]['password']);
            $user->setRole($this->getReference($users[$key]['role']));
            $manager->persist($user);
            $this->addReference('user_' . $key, $user);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            RoleFixtures::class,
        ];
    }
}
