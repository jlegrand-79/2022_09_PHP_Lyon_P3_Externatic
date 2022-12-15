<?php

namespace App\DataFixtures;

use App\Entity\Contract;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContractFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contracts = [
            'CDI',
            'CDD',
            'Stage',
            'Alternance',
            'Temps partiel',
        ];

        foreach ($contracts as $contractName) {
            $contract = new Contract();
            $contract->setType($contractName);
            $manager->persist($contract);
            $this->addReference('contract_' . $contractName, $contract);
        }
        $manager->flush();
    }
}
