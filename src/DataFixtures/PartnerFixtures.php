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
                'logo' => 'https://seekpng.com/png/full/376-3768060_stark-industries-logo.png',
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
