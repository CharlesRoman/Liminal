<?php

namespace App\Entity\Menu;

use App\Entity\Universe\Universe;
use App\Model\Activeable;
use App\Model\Rankable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;

/**
 * Class Menu
 * @package App\Entity\Menu
 * @ORM\Entity
 */
class Menu
{
    use Timestampable, SoftDeletable, Rankable, Activeable, Translatable;

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Menu\Menu")
     * @ORM\JoinColumns({ @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true) })
     * @var Menu|null
     */
    private $parent;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Menu\MenuPosition", mappedBy="menus")
     * @var Collection
     */
    private $menuPositions;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Universe\Universe", mappedBy="menus")
     * @var Collection
     */
    private $universes;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Menu|null
     */
    public function getParent(): ?Menu
    {
        return $this->parent;
    }

    /**
     * @param Menu|null $parent
     * @return void
     */
    public function setParent(?Menu $parent): void
    {
        $this->parent = $parent;
    }

    /**
     * @return Collection
     */
    public function getMenuPositions(): Collection
    {
        return $this->menuPositions;
    }

    /**
     * @param Collection $menuPositions
     * @return void
     */
    public function setMenuPositions(Collection $menuPositions): void
    {
        $this->menuPositions = $menuPositions;
    }

    /**
     * @param MenuPosition $menuPosition
     * @return void
     */
    public function addMenuPosition(MenuPosition $menuPosition): void
    {
        $menuPosition->addMenu($this);
        $this->menuPositions->add($menuPosition);
    }

    /**
     * @param MenuPosition $menuPosition
     * @return void
     */
    public function removeMenuPosition(MenuPosition $menuPosition): void
    {
        $this->menuPositions->removeElement($menuPosition);
        $menuPosition->removeMenu($this);
    }

    /**
     * @return Collection
     */
    public function getUniverses(): Collection
    {
        return $this->universes;
    }

    /**
     * @param Collection $universes
     * @return void
     */
    public function setUniverses(Collection $universes): void
    {
        $this->universes = $universes;
    }

    /**
     * @param Universe $universe
     */
    public function addUniverse(Universe $universe): void
    {
        $universe->addMenu($this);
        $this->universes->add($universe);
    }

    /**
     * @param Universe $universe
     * @return void
     */
    public function removeUniverse(Universe $universe): void
    {
        $this->universes->removeElement($universe);
        $universe->removeMenu($this);
    }
}
