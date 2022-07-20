<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Equipes extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 20; $i++) {
            $equipes = new Equipes();
            $equipes->setNom("Nom equipe $i");
            $equipes->setMembres("Membre $i");
            $equipes->setNombremembre("$i");
        }

        $manager->flush();
    }
}
