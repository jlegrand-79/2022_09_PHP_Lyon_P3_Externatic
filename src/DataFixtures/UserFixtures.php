<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $users = [
            [
                'email' => 'admin@externatic.com',
                'password' => 'password',
                'role' => 'ROLE_ADMIN',
            ],
            [
                'email' => 'bruce@wayne-entreprises.com',
                'password' => 'password',
                'role' => 'ROLE_RECRUITER',
            ],
            [
                'email' => 'lucius@wayne-entreprises.com',
                'password' => 'password',
                'role' => 'ROLE_RECRUITER',
            ],
            [
                'email' => 'tony@stark-industries.com',
                'password' => 'password',
                'role' => 'ROLE_RECRUITER',
            ],
            [
                'email' => 'virginia@stark-industries.com',
                'password' => 'password',
                'role' => 'ROLE_RECRUITER',
            ],
            [
                'email' => 'thomas.besson@mail.com',
                'password' => 'password',
                'role' => 'ROLE_CANDIDATE',
            ],
            [
                'email' => 'marcia.baila@mail.com',
                'password' => 'password',
                'role' => 'ROLE_CANDIDATE',
            ],
            [
                'email' => 'antoine.dupont@mail.com',
                'password' => 'password',
                'role' => 'ROLE_CANDIDATE',
            ],
            [
                'email' => 'chacha.da.rugna@mail.com',
                'password' => 'password',
                'role' => 'ROLE_CANDIDATE',
            ],
        ];

        foreach ($users as $key => $user) {
            $newUser = new User();
            $newUser->setEmail($user['email']);
            $hash = $this->passwordHasher->hashPassword($newUser, $user['password']);
            $newUser->setPassword($hash);
            $newUser->setRoles([$user['role']]);
            $manager->persist($newUser);
            $this->addReference('user_' . $key, $newUser);
        }
        $manager->flush();
    }
}
