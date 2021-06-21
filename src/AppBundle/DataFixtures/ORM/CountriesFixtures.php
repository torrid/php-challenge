<?php


namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CountriesFixtures extends Fixture
{

    public function load(ObjectManager $manager) :void
    {
        $countries = [
            ['id' => 'DE', 'name' => 'Germany',     'vat' =>  7.00],
            ['id' => 'AT', 'name' => 'Austria',     'vat' => 10.00],
            ['id' => 'CH', 'name' => 'Switzerland', 'vat' =>  2.50], 
            ['id' => 'BE', 'name' => 'Belgium',     'vat' =>  6.00],
            ['id' => 'NL', 'name' => 'Netherlands', 'vat' =>  9.00],
            ['id' => 'FR', 'name' => 'France',      'vat' => 10.00],
            ['id' => 'DK', 'name' => 'Denmark',     'vat' => 25.00],
            ['id' => 'PL', 'name' => 'Poland',      'vat' =>  5.00],
        ];

        foreach ($countries AS $spec) {
            $country = new Country();
            $country->setId($spec['id']);
            $country->setName($spec['name']);
            $country->setVat($spec['vat']);


            $manager->persist($country);
            $this->setReference('country-'.$spec['id'], $country);
        }

        $manager->flush();
    }
}
