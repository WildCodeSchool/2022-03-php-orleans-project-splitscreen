<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Event;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EventFixtures extends Fixture
{
    public const VALUE = 6;
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::VALUE; $i++) {
            $event = new Event();
            $event->setTitle($faker->word());
            $event->setImage('clash-royale-esport-min.jpg');
            $event->setDescription($faker->sentence(5));
            $manager->persist($event);
        }
        $manager->flush();
    }
}
