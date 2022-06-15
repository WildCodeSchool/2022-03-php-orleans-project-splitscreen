<?php

namespace App\DataFixtures;

use App\Entity\Picture;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PictureFixturesPhp extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $faker = Factory::create();

        $picture = new Picture();
        $picture->getName();
        $manager->flush();
    }
}
