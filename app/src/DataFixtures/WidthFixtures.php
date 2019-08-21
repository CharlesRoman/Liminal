<?php

namespace App\DataFixtures;

use App\Entity\Page\Width;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

final class WidthFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        // Implementation of bootstrap class
        $widths = [
            [
                'label'  => '25 %',
                'code'   => 'col-sm-3',
                'active' => true
            ],
            [
                'label'  => '33 %',
                'code'   => 'col-sm-4',
                'active' => true
            ],
            [
                'label'  => '50 %',
                'code'   => 'col-sm-6',
                'active' => true
            ],
            [
                'label'  => '66 %',
                'code'   => 'col-sm-8',
                'active' => true
            ],
            [
                'label'  => '75 %',
                'code'   => 'col-sm-9',
                'active' => true
            ],
            [
                'label'  => '100 %',
                'code'   => 'col-sm-12',
                'active' => true
            ]
        ];

        foreach ($widths as $w) {
            $width = new Width();
            $width->setLabel($w['label']);
            $width->setCode($w['code']);
            $width->setActive($w['active']);
            $manager->persist($width);
        }

        $manager->flush();
    }
}
