<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ParticipantFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $user = new Participant();
            $user->setPseudo('Toto');
            $user->setEvent($this->getReference('event0'));
            $manager->persist($user);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            EventFixtures::class,
        ];
    }
}
