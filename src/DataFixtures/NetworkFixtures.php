<?php

namespace App\DataFixtures;

use App\Entity\Network;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Length;

class NetworkFixtures extends Fixture
{
    private const NETWORKS = [
        'Facebook',
        'Instagram',
        'Twitter',
        'Discord',
        'Linkedin',
        'Tiktok',
    ];
    private const LINKS = [
        'https://www.facebook.com/splitscreenasso/',
        ' https://www.instagram.com/splitscreenasso',
        'https://twitter.com/SplitScreenn?t=7T9yIfazpk4ATZ2uhpn6FA&s=09',
        ' https://discord.gg/ftJeetZT9j',
        'https://www.linkedin.com/company/splitscreenasso',
        '',
    ];
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < count(self::NETWORKS); $i++) {
            $network = new Network();
            $network->setTitle(self::NETWORKS[$i]);
            $network->setLink(self::LINKS[$i]);
            $manager->persist($network);
            $this->addReference('networks' . $i, $network);
        }
        $manager->flush();
    }
}
