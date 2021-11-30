<?php

namespace App\DataFixtures;
use App\Entity\TicketManagement;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TicketFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i=0 ; $i<30 ; $i++) {
            $ticket = new TicketManagement();
            $ticket->setTitre($faker->titre);
            $ticket->setNompersonne($faker->nompersonne);
            $ticket->setDescription($faker->description);
            $ticket->setStatut($faker->statut);
            $date = new \DateTime();
            $date->setTime($faker->numberBetween(1990,2023),$faker->numberBetween(1,12),$faker->numberBetween(1990,2023));
            $ticket->setCreationDate($date);
            $manager->persist($ticket);
        }

        $manager->flush();
    }
}







