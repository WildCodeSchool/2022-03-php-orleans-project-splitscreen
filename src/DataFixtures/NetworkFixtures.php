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
            'title' => 'Facebook',
            'link' => 'https://www.facebook.com/splitscreenasso'
        ],
        [
            'title' => 'Instagram',
            'link' => 'https://www.instagram.com/splitscreenasso'
        ],
        [
            'title' => 'Twitter',
            'link' => 'https://twitter.com/SplitScreenn?t=7T9yIfazpk4ATZ2uhpn6FA&s=09'
        ],
        [
            'title' => 'Discord',
            'link' => 'https://discord.gg/ftJeetZT9j'
        ],
        [
            'title' => 'Linkedin',
            'link' => 'https://www.linkedin.com/company/splitscreenasso'
        ],
        [
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
            $this->addReference('network_' . $networkItems['title'], $network);
        }

        $manager->flush();
    }
}
