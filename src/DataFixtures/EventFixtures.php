<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\Event;
use App\Services\Slugify;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EventFixtures extends Fixture
{
    private Slugify $slugify;
    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public const VALUE = 6;
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i <= self::VALUE; $i++) {
            $event = new Event();
            $event->setTitle($faker->words(2, true));
            $event->setDate($faker->dateTime());
            $event->setImage('clash-royale-esport-min.jpg');
            $event->setCatchPhrase($faker->words(5, true));
            $event->setDescription($faker->sentence(50));
            $event->setSlug($this->slugify->generate($event->getTitle()));
            $imageName = 'event' . $i . '.jpg';
            copy('src/DataFixtures/event.jpg', 'public/uploads/event/' . $imageName);
            $event->setImage($imageName);
            $this->addReference('event' . $i, $event);
            $manager->persist($event);
        }
        $manager->flush();
    }
}
