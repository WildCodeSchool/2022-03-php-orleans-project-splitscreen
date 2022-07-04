<?php

namespace App\NetworkFixtures;

use App\Entity\Network;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Length;

class NetworkFixtures extends Fixture
{
    public const NETWORKS = [
        [
            'id' => 0,
            'title' => 'Facebook',
            'link' => 'https://www.facebook.com/splitscreenasso'
        ],
        [
            'id' => 1,
            'title' => 'Instagram',
            'link' => 'https://www.instagram.com/splitscreenasso'
        ],
        [
            'id' => 2,
            'title' => 'Twitter',
            'link' => 'https://twitter.com/SplitScreenn?t=7T9yIfazpk4ATZ2uhpn6FA&s=09'
        ],
        [
            'id' => 3,
            'title' => 'Discord',
            'link' => 'https://discord.gg/ftJeetZT9j'
        ],
        [
            'id' => 4,
            'title' => 'Linkedin',
            'link' => 'https://www.linkedin.com/company/splitscreenasso'
        ],
        [
            'id' => 5,
            'title' => 'TikTok',
            'link' => ''
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::NETWORKS as $networkItems) {
            $network = new Network();
            $network->setTitle($networkItems['title']);
            $network->setLink($networkItems['link']);
            $manager->persist($network);
            $this->addReference('network_' . $networkItems['id'], $network);
        }

        $manager->flush();
    }
}
