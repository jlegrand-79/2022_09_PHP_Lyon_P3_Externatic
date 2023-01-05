<?php

namespace App\DataFixtures;

use App\Entity\Candidate;
use DateTime;
use DateTimeImmutable;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;

class CandidateFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $candidates = [
            [
                'user' => 'user_5',
                'gender' => 'Autre',
                'firstname' => 'Thomas',
                'lastname' => 'Besson',
                'birthday' => new DateTime('1988-04-26'),
                'phone' => '0623456589',
                'address' => 'Chemin de la tuilerie',
                'address_complement' => '',
                'postal_code' => '49000',
                'city' => 'Angers',
                'picture' => 'thomasphoto.jpeg',
                'stacks' => 'PHP',
                'contract_searched' => 'contract_CDI',
            ],
            [
                'user' => 'user_6',
                'gender' => 'Femme',
                'firstname' => 'Marcia',
                'lastname' => 'Baila',
                'birthday' => new DateTime('1990-03-10'),
                'phone' => '0629646589',
                'address' => 'Avenue du non retour',
                'address_complement' => '',
                'postal_code' => '38200',
                'city' => 'Tours',
                'picture' => 'marciaphoto.jpeg',
                'curriculum_vitae' => 'marciacv.pdf',
                'stacks' => 'Javascript',
                'contract_searched' => 'contract_CDD',
            ],
            [
                'user' => 'user_7',
                'gender' => 'Homme',
                'firstname' => 'Antoine',
                'lastname' => 'Dupont',
                'birthday' => new DateTime('1986-11-10'),
                'phone' => '0623456589',
                'address' => 'Ronde des roses',
                'address_complement' => '',
                'postal_code' => '59000',
                'city' => 'Lyon',
                'curriculum_vitae' => 'antoinecv.pdf',
                'stacks' => 'mySQL',
                'contract_searched' => 'contract_CDI',
            ],
            [
                'user' => 'user_8',
                'gender' => 'Femme',
                'firstname' => 'Chacha',
                'lastname' => 'Da Rugna',
                'birthday' => new DateTime('1994-03-10'),
                'phone' => '0687656589',
                'address' => 'Route du talent',
                'address_complement' => 'Digicode 391A',
                'postal_code' => '01000',
                'city' => 'Chezpo',
                'picture' => 'chachaphoto.jpeg',
                'curriculum_vitae' => 'chachacv.pdf',
                'stacks' => 'Java',
                'contract_searched' => 'contract_CDD',
            ],
        ];

        foreach ($candidates as $key => $candidate) {
            $newCandidate = new Candidate();
            $newCandidate->setGender($candidate['gender']);
            $newCandidate->setFirstname($candidate['firstname']);
            $newCandidate->setLastname($candidate['lastname']);
            $newCandidate->setBirthday($candidate['birthday']);
            $newCandidate->setPhone($candidate['phone']);
            $newCandidate->setAddress($candidate['address']);
            $newCandidate->setAddressComplement($candidate['address_complement']);
            $newCandidate->setPostalCode($candidate['postal_code']);
            $newCandidate->setCity($candidate['city']);
            if (!empty($candidate['picture'])) {
                $newCandidate->setPicture($candidate['picture']);
            }
            if (!empty($candidate['curriculum_vitae'])) {
                $newCandidate->setCv($candidate['curriculum_vitae']);
            }
            $newCandidate->setUser($this->getReference($candidate['user']));
            $newCandidate->addStack($this->getReference($candidate['stacks']));
            $newCandidate->addContractSearched($this->getReference($candidate['contract_searched']));
            $manager->persist($newCandidate);
            $this->addReference('candidate_' . $key, $newCandidate);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            StackFixtures::class,
        ];
    }
}
