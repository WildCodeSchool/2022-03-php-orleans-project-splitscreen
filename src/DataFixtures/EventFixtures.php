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
        $event->setDescription('Premier tournois de l\'association');
        $manager->persist($event);
        $manager->flush();
    }
}
