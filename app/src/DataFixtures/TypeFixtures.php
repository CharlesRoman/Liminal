<?php

namespace App\DataFixtures;

use App\Entity\Page\BlockType;
use App\Entity\Page\PageType;
use App\Entity\Page\RowType;
use App\Entity\Page\TypeEntityInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

final class TypeFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @return void
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $types = [
            BlockType::class => [
                [
                    'label' => 'Texte',
                    'code'  => BlockType::TEXT
                ],
                [
                    'label' => 'Image',
                    'code'  => BlockType::IMAGE
                ]
            ],
            RowType::class   => [
                [
                    'label' => 'Normal',
                    'code'  => RowType::NORMAL
                ],
                [
                    'label' => 'Bannière',
                    'code'  => RowType::BANNER
                ]
            ],
            PageType::class  => [
                [
                    'label' => 'Simple',
                    'code'  => PageType::SIMPLE
                ],
                [
                    'label' => 'Complexe',
                    'code'  => PageType::COMPLEX
                ]
            ]
        ];

        foreach ($types as $typeClassName => $dataType) {
            foreach ($dataType as $data) {
                $type = new $typeClassName();

                if (!$type instanceof TypeEntityInterface) {
                    throw new Exception(\Safe\sprintf('$s is not an instance of %s', $typeClassName, TypeEntityInterface::class));
                }

                $type->setLabel($data['label']);
                $type->setCode($data['code']);
                $manager->persist($type);
            }

        }

        $manager->flush();
    }
}
