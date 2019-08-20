<?php

namespace App\Entity\Universe;

use App\Entity\Menu\Menu;
use App\Entity\User;
use App\Model\Activeable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;

/**
 * Class Universe
 * @package App\Entity\Universe
 * @ORM\Entity
 */
class Universe
{
    use Timestampable, SoftDeletable, Activeable, Translatable;

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
    private $domain;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $directory;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Menu\Menu", inversedBy="universes")
     * @ORM\JoinTable(name="menu_universe")
     * @var Collection
     */
    private $menus;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="universes")
     * @ORM\JoinTable(name="user_universe")
     * @var Collection
     */
    private $users;

    /**
     * Universe constructor.
     */
    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->users = new ArrayCollection();
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
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     * @return void
     */
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getDirectory(): string
    {
        return $this->directory;
    }

    /**
     * @param string $directory
     * @return void
     */
    public function setDirectory(string $directory): void
    {
        $this->directory = $directory;
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
        $menu->addUniverse($this);
        $this->menus->add($menu);
    }

    /**
     * @param Menu $menu
     * @return void
     */
    public function removeMenu(Menu $menu): void
    {
        $this->menus->removeElement($menu);
        $menu->removeUniverse($this);
    }

    /**
     * @return Collection
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    /**
     * @param Collection $users
     * @return void
     */
    public function setUsers(Collection $users): void
    {
        $this->users = $users;
    }

    /**
     * @param User $user
     * @return void
     */
    public function addUser(User $user): void
    {
        $user->addUniverse($this);
        $this->users->add($user);
    }

    /**
     * @param User $user
     * @return void
     */
    public function removeUser(User $user): void
    {
        $this->users->removeElement($user);
        $user->removeUniverse($this);
    }
}
