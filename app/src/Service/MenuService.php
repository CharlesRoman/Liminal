<?php

namespace App\Service;

use App\Entity\Menu\Menu;
use App\Entity\Menu\MenuPosition;
use App\Entity\Universe\Universe;
use Doctrine\ORM\EntityManagerInterface;
use mysql_xdevapi\Exception;

final class MenuService extends AbstractService
{

    /**
     * @param int|null $id
     * @param string|null $label
     * @param string|null $link
     * @param string|null $fontAwesomeIcon
     * @param int|null $rank
     * @param int|null $active
     * @param int|null $parentId
     * @return Menu
     */
    public function saveMenu(
        ?int $id = null,
        ?string $label = null,
        ?string $link = null,
        ?string $fontAwesomeIcon = null,
        ?int $rank = null,
        ?int $active = null,
        ?int $parentId = null
    ): Menu {
        $locale = $this->rs->getCurrentRequest()->getLocale();

        if ($id !== null) {
            $menuEntity = $this->em->getRepository(Menu::class)->findOneBy(['id' => $id]);
        } else {
            $menuEntity = new Menu();
        }

        if ($label !== null) {
            $menuEntity->translate($locale)->setLabel($label);
        }

        if ($link !== null) {
            $menuEntity->translate($locale)->setLink($link);
        }

        if ($fontAwesomeIcon !== null) {
            $menuEntity->translate($locale)->setFontAwesomeIcon($fontAwesomeIcon);
        }

        if ($rank !== null) {
            $menuEntity->setRank($rank);
        }

        if ($active !== null) {
            $menuEntity->setActive($active);
        }

        if ($parentId !== null) {
            /** @var Menu $parentMenu */
            $parentMenu = $this->em->getRepository(Menu::class)->findOneBy(['id' => $parentId]);
            if ($parentMenu !== null) {
                $menuEntity->setParent($parentMenu);
            }
        }

        $this->em->persist($menuEntity);
        $this->em->flush();

        return $menuEntity;
    }

    /**
     * @param int $id
     * @param int $menuPositionId
     * @return Menu
     * @throws \Exception
     */
    public function attachMenuPosition(int $id, int $menuPositionId): Menu
    {
        /** @var MenuPosition $menuPosition */
        $menuPositionEntity = $this->em->getRepository(MenuPosition::class)->findOneBy(['id' => $menuPositionId]);
        /** @var Menu $menu */
        $menuEntity = $this->em->getRepository(Menu::class)->findOneBy(['id' => $id]);

        if ($menuEntity !== null && $menuPositionEntity !== null && $menuEntity instanceof Menu && $menuPositionEntity instanceof MenuPosition) {
            $menuEntity->addMenuPosition($menuPositionEntity);
        } else {
            throw new \Exception('menu or menu position has not been gathered correctly to attach menu position to menu');
        }

        $this->em->persist($menuEntity);
        $this->em->flush();

        return $menuEntity;
    }

    /**
     * @param int $id
     * @param int $universeId
     * @return Menu
     * @throws \Exception
     */
    public function attachUniverse(int $id, int $universeId): Menu
    {
        /** @var Universe $universeEntity */
        $universeEntity = $this->em->getRepository(Universe::class)->findOneBy(['id' => $universeId]);
        /** @var Menu $menu */
        $menuEntity = $this->em->getRepository(Menu::class)->findOneBy(['id' => $id]);

        if ($menuEntity !== null && $universeEntity !== null && $menuEntity instanceof Menu && $universeEntity instanceof Universe) {
            $menuEntity->addUniverse($universeEntity);
        } else {
            throw new \Exception('menu or universe has not been gathered correctly to attach universe to menu');
        }

        $this->em->persist($menuEntity);
        $this->em->flush();

        return $menuEntity;
    }

    /**
     * @return object[]
     */
    public function getAll(): array
    {
        return $this->em->getRepository(Menu::class)->findBy([], ['id' => 'DESC']);
    }
}
