<?php

namespace App\DataFixtures;

use App\Entity\ContractType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContractTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contractTypes = [
            'CDI',
            'CDD',
            'Stage',
            'Alternance',
            'Temps partiel',
        ];

        foreach ($contractTypes as $contractTypeName) {
            $contractType = new ContractType();
            $contractType->setName($contractTypeName);
            $manager->persist($contractType);
            $this->addReference('contract_type_' . $contractTypeName, $contractType);
        }
        $manager->flush();
    }
}
