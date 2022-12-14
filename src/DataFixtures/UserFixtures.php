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

        foreach ($users as $key => $user) {
            $newUser = new User();
            $newUser->setEmail($user['email']);
            $newUser->setPassword($user['password']);
            $newUser->setRole($this->getReference($user['role']));
            $manager->persist($newUser);
            $this->addReference('user_' . $key, $newUser);
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
