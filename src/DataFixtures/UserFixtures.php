<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $users = [
            [
                'email' => 'bruce@wayne-entreprises.com',
                'password' => 'password',
                'role' => 'ROLE_USER',
            ],
            [
                'email' => 'lucius@wayne-entreprises.com',
                'password' => 'password',
                'role' => 'ROLE_USER',
            ],
            [
                'email' => 'tony@stark-industries.com',
                'password' => 'password',
                'role' => 'ROLE_USER',
            ],
            [
                'email' => 'virginia@stark-industries.com',
                'password' => 'password',
                'role' => 'ROLE_USER',
            ],
        ];

        foreach ($users as $key => $user) {
            $newUser = new User();
            $newUser->setEmail($user['email']);
            $newUser->setPassword($user['password']);
            $newUser->setRoles([$user['role']]);
            $manager->persist($newUser);
            $this->addReference('user_' . $key, $newUser);
        }
        $manager->flush();
    }
}