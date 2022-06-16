<?php

namespace App\DataFixtures;

use App\Entity\Actuality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ActualityFixtures extends Fixture
{
    public const VALUE = 6;
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::VALUE; $i++) {
            $actuality = new Actuality();
            $actuality->setTitle($faker->word());
            $actuality->setDate($faker->dateTime());
            $actuality->setImage('Actuality.jpg');
            $actuality->setMessage($faker->sentence(5));
            $manager->persist($actuality);
        }
        $manager->flush();
    }
}
