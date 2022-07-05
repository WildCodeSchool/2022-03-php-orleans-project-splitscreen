<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ParticipantFixtures extends Fixture implements DependentFixtureInterface
{
    public const NBPARTICIPANT = 20;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::NBPARTICIPANT; $i++) {
            $user = new Participant();
            $user->setPseudo($faker->name());
            $user->setEvent($this->getReference('event' . rand(0, EventFixtures::VALUE)));
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
