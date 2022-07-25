<?php

namespace App\DataFixtures;

use App\Services\Slugify;
use App\Entity\Actuality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ActualityFixtures extends Fixture
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

        for ($i = 0; $i < self::VALUE; $i++) {
            $actuality = new Actuality();
            $actuality->setTitle($faker->word());
            $actuality->setDate($faker->dateTime());
            $imageName = 'actu' . $i . '.webp';
            copy('src/DataFixtures/actu.webp', 'public/uploads/actu/' . $imageName);
            $actuality->setImage($imageName);
            $actuality->setCatchPhrase($faker->words(5, true));
            $actuality->setDescription($faker->sentence(50));
            $actuality->setSlug($this->slugify->generate($actuality->getTitle()));
            $manager->persist($actuality);
        }
        $manager->flush();
    }
}
