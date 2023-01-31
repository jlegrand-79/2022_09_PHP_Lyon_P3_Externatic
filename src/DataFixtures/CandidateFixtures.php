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
                'user' => 'user_9',
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
                'stacks' => ['PHP'],
                'contract_searched' => ['contract_CDI', 'contract_CDD'],
            ],
            [
                'user' => 'user_10',
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
                'stacks' => ['Javascript', 'PHP'],
                'contract_searched' => ['contract_CDD', 'contract_Alternance']
            ],
            [
                'user' => 'user_11',
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
                'stacks' => ['mySQL', 'Python'],
                'contract_searched' => ['contract_CDI'],
            ],
            [
                'user' => 'user_12',
                'gender' => 'Femme',
                'firstname' => 'Charlène',
                'lastname' => 'Da Rugna',
                'birthday' => new DateTime('1994-03-10'),
                'phone' => '0687656589',
                'address' => 'Route du talent',
                'address_complement' => 'Digicode 391A',
                'postal_code' => '01000',
                'city' => 'Chezpo',
                'picture' => 'chachaphoto.jpeg',
                'curriculum_vitae' => 'chachacv.pdf',
                'stacks' => ['Java'],
                'contract_searched' => ['contract_Alternance'],
            ],
            [
                'user' => 'user_14',
                'gender' => 'Homme',
                'firstname' => 'Léo',
                'lastname' => 'Colombo',
                'birthday' => new DateTime('1985-05-08'),
                'phone' => '0645235656',
                'address' => '18 Rue de la gare',
                'address_complement' => 'Batiment 7',
                'postal_code' => '75001',
                'city' => 'Paris',
                'picture' => 'leocolomb.jpg',
                'curriculum_vitae' => 'cvleocolomb.jpg',
                'stacks' => ['Javascript', 'PHP'],
                'contract_searched' => ['contract_CDI'],
            ],
            [
                'user' => 'user_15',
                'gender' => 'Femme',
                'firstname' => 'Stéphanie',
                'lastname' => 'Durand',
                'birthday' => new DateTime('1947-01-01'),
                'phone' => '0645235656',
                'address' => '18 Grande Rue',
                'address_complement' => '',
                'postal_code' => '73700',
                'city' => 'Les Arcs',
                'picture' => 'stephaniedurand.jpg',
                'curriculum_vitae' => 'cvstephaniedurand.jpg',
                'stacks' => ['PHP'],
                'contract_searched' => ['contract_Alternance'],
            ],
            [
                'user' => 'user_16',
                'gender' => 'Homme',
                'firstname' => 'Stéphan',
                'lastname' => 'Trintignant',
                'birthday' => new DateTime('2001-12-08'),
                'phone' => '0645235656',
                'address' => '18 rue de la vitesse',
                'address_complement' => '',
                'postal_code' => '38000',
                'city' => 'Grenoble',
                'picture' => 'stephanetrintignant.jpg',
                'curriculum_vitae' => 'cvstephanetrintignant.jpg',
                'stacks' => ['mySQL', 'PHP'],
                'contract_searched' => ['contract_CDI'],
            ],
            [
                'user' => 'user_17',
                'gender' => 'Femme',
                'firstname' => 'Amina',
                'lastname' => 'Sous-Colline',
                'birthday' => new DateTime('1995-05-31'),
                'phone' => '0645235656',
                'address' => "18 rue de l'anneau",
                'address_complement' => 'Bree',
                'postal_code' => '32000',
                'city' => 'Chemazé',
                'picture' => 'aminacolline.jpg',
                'curriculum_vitae' => 'cvaminacolline.jpg',
                'stacks' => ['mySQL'],
                'contract_searched' => ['contract_CDI'],
            ]
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
                $newCandidate->setCurriculumVitae($candidate['curriculum_vitae']);
            }
            $newCandidate->setUser($this->getReference($candidate['user']));
            foreach ($candidate['stacks'] as $stack) {
                $newCandidate->addStack($this->getReference($stack));
            }
            foreach ($candidate['contract_searched'] as $contractSearched) {
                $newCandidate->addContractSearched($this->getReference($contractSearched));
            }
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
