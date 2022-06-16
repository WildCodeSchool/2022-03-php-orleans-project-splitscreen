<?php

namespace App\DataFixtures;

use App\Entity\Actu;
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
            $actu = new Actu();
            $actu->setTitle($faker->word());
            $actu->setDate($faker->dateTime());
            $actu->setImage('Actuality.jpg');
            $actu->setMessage($faker->sentence(5));
            $manager->persist($actu);
        }
        $manager->flush();
    }
}
