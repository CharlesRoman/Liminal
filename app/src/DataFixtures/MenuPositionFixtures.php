<?php

namespace App\DataFixtures;

use App\Entity\Menu\MenuPosition;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

final class MenuPositionFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $menuPositions = [
            [
                'id' => MenuPosition::HEADER,
                'label' => 'Header',
                'rank' => 10,
                'active' => true
            ],
            [
                'id' => MenuPosition::FOOTER,
                'label' => 'Footer',
                'rank' => 20,
                'active' => true
            ],
            [
                'id' => MenuPosition::CREDENTIALS,
                'label' => 'Credits',
                'rank' => 30,
                'active' => true
            ]
        ];

        foreach ($menuPositions as $pos) {
            $menuPosition = new MenuPosition();
            $menuPosition->setId($pos['id']);
            $menuPosition->setLabel($pos['label']);
            $menuPosition->setRank($pos['rank']);
            $menuPosition->setActive($pos['active']);
            $manager->persist($menuPosition);
        }

        $manager->flush();
    }
}
