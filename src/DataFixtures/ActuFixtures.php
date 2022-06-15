<?php

namespace App\DataFixtures;

use App\Entity\Actu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * This will suppress all the PMD warnings in
 * this class.
 *
 * @SuppressWarnings(PHPMD)
 */
class ActuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $actu = new Actu();
            $actu->setTitle('Zelda' . $i);
            $actu->setImage('Gaming.jpg');
            $actu->setDescription('Link est un chevalier' . $i);
            $actu->setDate(new \DateTime('06/04/2014'));
            $manager->persist($actu);
        }
        $manager->flush();
    }
}
