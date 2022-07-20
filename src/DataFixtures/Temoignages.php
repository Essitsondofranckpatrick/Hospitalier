<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Temoignages extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 20; $i++) {
            $temoignages = new Temoignages();
            $temoignages->setNom("Nom Membre $i");
            $temoignages->setPrenom("Prenom Membre $i");
            $temoignages->setEmail("admin_$i@example.com");
            $temoignages->setMessage("Message dfsqg $i");
        }

        $manager->flush();
    }
}
