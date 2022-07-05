<?php

namespace App\DataFixtures;

use App\Entity\HelloAsso;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HelloAssoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $helloAsso = new HelloAsso();
        $helloAsso->setLink("https://www.helloasso.com/associations/split-screen");
        $manager->persist($helloAsso);
        $manager->flush();
    }
}
