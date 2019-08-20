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
     * @return Menu
     */
    public function setId(int $id): Menu
    {
        $this->id = $id;

        return $this;
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
     * @return Menu
     */
    public function setParent(?Menu $parent): Menu
    {
        $this->parent = $parent;

        return $this;
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
     * @return Menu
     */
    public function setMenuPositions(Collection $menuPositions): Menu
    {
        $this->menuPositions = $menuPositions;

        return $this;
    }

    /**
     * @param MenuPosition $menuPosition
     * @return Menu
     */
    public function addMenuPosition(MenuPosition $menuPosition): Menu
    {
        $menuPosition->addMenu($this);
        $this->menuPositions->add($menuPosition);

        return $this;
    }

    /**
     * @param MenuPosition $menuPosition
     * @return Menu
     */
    public function removeMenuPosition(MenuPosition $menuPosition): Menu
    {
        $this->menuPositions->removeElement($menuPosition);
        $menuPosition->removeMenu($this);

        return $this;
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
     * @return Menu
     */
    public function setUniverses(Collection $universes): Menu
    {
        $this->universes = $universes;

        return $this;
    }

    public function addUniverse(Universe $universe): Menu
    {
        $universe->addMenu($this);
        $this->universes->add($universe);

        return $this;
    }

    /**
     * @param Universe $universe
     * @return Menu
     */
    public function removeUniverse(Universe $universe): Menu
    {
        $this->universes->removeElement($universe);
        $universe->removeMenu($this);

        return $this;
    }
}
