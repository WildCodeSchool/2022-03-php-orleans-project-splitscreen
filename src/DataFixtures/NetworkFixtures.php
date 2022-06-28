<?php

namespace App\DataFixtures;

use App\Entity\Network;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NetworkFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $network = new Network();
        $network->setTitle('Facebook');
        $network->setLink('https://www.facebook.com/splitscreenasso/');
        $manager->persist($network);
        $manager->flush();
    }
}
