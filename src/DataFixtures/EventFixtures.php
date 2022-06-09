<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $event = new Event();
        $event->setTitle('Max effect');
        $event->setImage('clash-royale-esport.jpg');
        $event->setDescription('Premier tournoi de l\'association');
        $manager->persist($event);
        $manager->flush();
    }
}
