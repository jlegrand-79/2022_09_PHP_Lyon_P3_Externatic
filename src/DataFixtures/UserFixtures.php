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
                'password' => 'Admin_123',
                'role' => 'ROLE_ADMIN',
            ],
            [
                'email' => 'bruce@wayne-entreprises.com',
                'password' => 'Brubru_123',
                'role' => 'ROLE_RECRUITER',
            ],
            [
                'email' => 'lucius@wayne-entreprises.com',
                'password' => 'Lucluc_123',
                'role' => 'ROLE_RECRUITER',
            ],
            [
                'email' => 'tony@stark-industries.com',
                'password' => 'Tonton_123',
                'role' => 'ROLE_RECRUITER',
            ],
            [
                'email' => 'virginia@stark-industries.com',
                'password' => 'Virvir_123',
                'role' => 'ROLE_RECRUITER',
            ],
            [
                'email' => 'annastepanoff@wildcodeschool.com',
                'password' => 'Anna_123',
                'role' => 'ROLE_RECRUITER',
            ],
            [
                'email' => 'romaincoeur@wildcodeschool.com',
                'password' => 'coeur_123',
                'role' => 'ROLE_RECRUITER',
            ],
            [
                'email' => 'gerarddupont@externatic.com',
                'password' => 'gege_123',
                'role' => 'ROLE_RECRUITER',
            ],
            [
                'email' => 'juliebrouillard@externatic.com',
                'password' => 'juju_123',
                'role' => 'ROLE_RECRUITER',
            ],
            [
                'email' => 'thomas.besson@mail.com',
                'password' => 'Thotho_123',
                'role' => 'ROLE_CANDIDATE',
            ],
            [
                'email' => 'marcia.baila@mail.com',
                'password' => 'Marmar_123',
                'role' => 'ROLE_CANDIDATE',
            ],
            [
                'email' => 'antoine.dupont@mail.com',
                'password' => 'Toitoi_123',
                'role' => 'ROLE_CANDIDATE',
            ],
            [
                'email' => 'chacha.da.rugna@mail.com',
                'password' => 'Chacha_123',
                'role' => 'ROLE_CANDIDATE',
            ],
            [
                'email' => 'jeje01@mail.com',
                'password' => 'Jeje_123',
                'role' => 'ROLE_CANDIDATE',
            ],
            [
                'email' => 'leocolombo@mail.com',
                'password' => 'lolo_123',
                'role' => 'ROLE_CANDIDATE',
            ],
            [
                'email' => 'stephaniedurand@mail.com',
                'password' => 'steph_123',
                'role' => 'ROLE_CANDIDATE',
            ],
            [
                'email' => 'stephtrintignant@mail.com',
                'password' => 'steph_123',
                'role' => 'ROLE_CANDIDATE',
            ],
            [
                'email' => 'aminasouscolline@mail.com',
                'password' => 'colline_123',
                'role' => 'ROLE_CANDIDATE',
            ]
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
