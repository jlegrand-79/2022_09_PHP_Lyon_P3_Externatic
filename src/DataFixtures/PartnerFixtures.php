<?php

namespace App\DataFixtures;

use App\Entity\Partner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PartnerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $partners = [
            [
                'name' => 'Stark Industries',
                'description' => "Stark Industries (NYSE : SIA, NASDAQ : STRK, fictionnels),"
                    . " plus tard également connue sous les noms de Stark International, Stark Innovations,"
                    . " Stark/Fujikawa, Stark Enterprises, Stark Solutions et Stark Resilient, est une entreprise"
                    . " multinationale américaine de fiction présente dans l'univers Marvel de la maison d'édition"
                    . " Marvel Comics. Créée par Robert Bernstein (en), Stan Lee et Jack Kirby, la société fait sa"
                    . " première apparition dans le comic book Tales of Suspense #40 en avril 1963.",
                'picture' => "https://static.wikia.nocookie.net/marvelcinematicuniverse/images/7/7d/"
                    . "Stark_Industries.png",
                'address' => 'Stark Enterprises Building',
                'address_complement' => 'Beverly Hills',
                'postal_code' => '90210',
                'city' => 'Los Angeles, California',
                'logo' => 'https://i.pinimg.com/564x/72/5a/0d/725a0dd721d59db233c05b01963cd9ed.jpg',
                'url' => 'https://marvelcinematicuniverse.fandom.com/wiki/Stark_Industries',
            ],
            [
                'name' => 'Wayne Enterprises',
                'description' => "Wayne Enterprises (anciennement WayneCorp, après Wayne-Powers, parfois Wayne"
                    . " Incorporated) est un conglomérat fictif de l'Univers DC, possédé par le richissime Bruce"
                    . " Wayne et dirigé par Lucius Fox dans la série de comics Batman créé par Bob Kane et Bill"
                    . " Finger en 1939.",
                'picture' => 'https://upload.wikimedia.org/wikipedia/commons/f/f4/Board_of_Trade.JPG',
                'address' => 'Wayne Tower',
                'address_complement' => '1939 Kane Street',
                'postal_code' => '99999',
                'city' => 'Gotham City',
                'logo' => 'https://static.wikia.nocookie.net/batman/images/d/dd/Wayne_Enterprises_Logo.png',
                'url' => 'https://dc.fandom.com/wiki/Wayne_Enterprises',
            ],
            [
                'name' => 'Wild Code School',
                'description' => "La Wild Code School est une école innovante et un réseau européen de campus"
                    . " qui forment aux métiers tech des spécialistes adaptables. C'est une marque de la société"
                    . " Innov'Educ.",
                'picture' => 'https://shorturl.at/aksX2',
                'address' => '17 Rue Delandine',
                'address_complement' => 'Vieille Prison',
                'postal_code' => '69002',
                'city' => 'Lyon',
                'logo' => 'https://campusnumerique.auvergnerhonealpes.fr/app/uploads/2020/06/Logo-Wild-new.jpg',
                'url' => 'https://www.wildcodeschool.com/fr-FR',
            ],
            [
                'name' => 'Externatic',
                'description' => "Externatic est un cabinet de recrutement informatique et de conseil RH"
                    . " qui répond aux vrais besoins de vraies personnes. Nos offres d'emploi 100% client final.",
                'picture' => 'https://shorturl.at/rzALY',
                'address' => '1 Rue Racine',
                'address_complement' => 'Bat. A',
                'postal_code' => '44000',
                'city' => 'Nantes',
                'logo' => 'https://www.externatic.fr/wp-content/uploads/2022/10/Logo-Externatic.svg',
                'url' => 'https://www.externatic.fr/',
            ],
        ];

        foreach ($partners as $key => $partner) {
            $newPartner = new Partner();
            $newPartner->setName($partner['name']);
            $newPartner->setDescription($partner['description']);
            $newPartner->setPicture($partner['picture']);
            $newPartner->setAddress($partner['address']);
            $newPartner->setAddressComplement($partner['address_complement']);
            $newPartner->setPostalCode($partner['postal_code']);
            $newPartner->setCity($partner['city']);
            $newPartner->setLogo($partner['logo']);
            $newPartner->setUrl($partner['url']);
            $manager->persist($newPartner);
            $this->addReference('partner_' . $key, $newPartner);
        }
        $manager->flush();
    }
}
