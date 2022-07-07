<?php

namespace App\DataFixtures;

use App\Entity\Network;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Length;

class NetworkFixtures extends Fixture
{
    public const NETWORKS = [
        [
            'title' => 'facebook',
            'link' => 'https://www.facebook.com/splitscreenasso'
        ],
        [
            'title' => 'instagram',
            'link' => 'https://www.instagram.com/splitscreenasso'
        ],
        [
            'title' => 'twitter',
            'link' => 'https://twitter.com/SplitScreenn?t=7T9yIfazpk4ATZ2uhpn6FA&s=09'
        ],
        [
            'title' => 'discord',
            'link' => 'https://discord.gg/ftJeetZT9j'
        ],
        [
            'title' => 'linkedin',
            'link' => 'https://www.linkedin.com/company/splitscreenasso'
        ],
        [
            'title' => 'tiktok',
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
