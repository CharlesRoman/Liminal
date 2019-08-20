<?php

namespace App\Entity\Menu;

use App\Model\Activeable;
use App\Model\Rankable;
use App\Model\StringableInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MenuPosition
 * @package App\Entity\Menu
 * @ORM\Entity
 */
class MenuPosition implements StringableInterface
{
    use Activeable, Rankable;

    const HEADER      = 1;
    const FOOTER      = 2;
    const CREDENTIALS = 3;

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $label;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Menu\Menu", inversedBy="menuPositions")
     * @ORM\JoinTable(name="menu_menu_position")
     * @var Collection
     */
    private $menus;

    /**
     * MenuPosition constructor.
     */
    public function __construct()
    {
        $this->menus = new ArrayCollection();
    }

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
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return void
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return Collection
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    /**
     * @param Collection $menus
     * @return void
     */
    public function setMenus(Collection $menus): void
    {
        $this->menus = $menus;
    }

    /**
     * @param Menu $menu
     * @return void
     */
    public function addMenu(Menu $menu): void
    {
        $menu->addMenuPosition($this);
        $this->menus->add($menu);
    }

    /**
     * @param Menu $menu
     * @return void
     */
    public function removeMenu(Menu $menu): void
    {
        $this->menus->removeElement($menu);
        $menu->removeMenuPosition($this);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->getLabel();
    }
}
