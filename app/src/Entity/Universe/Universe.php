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
     * @return Universe
     */
    public function setId(int $id): Universe
    {
        $this->id = $id;

        return $this;
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
     * @return Universe
     */
    public function setDomain(string $domain): Universe
    {
        $this->domain = $domain;

        return $this;
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
     * @return Universe
     */
    public function setDirectory(string $directory): Universe
    {
        $this->directory = $directory;

        return $this;
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
     * @return Universe
     */
    public function setMenus(Collection $menus): Universe
    {
        $this->menus = $menus;

        return $this;
    }

    /**
     * @param Menu $menu
     * @return Universe
     */
    public function addMenu(Menu $menu): Universe
    {
        $menu->addUniverse($this);
        $this->menus->add($menu);

        return $this;
    }

    /**
     * @param Menu $menu
     * @return Universe
     */
    public function removeMenu(Menu $menu): Universe
    {
        $this->menus->removeElement($menu);
        $menu->removeUniverse($this);

        return $this;
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
     * @return Universe
     */
    public function setUsers(Collection $users): Universe
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @param User $user
     * @return Universe
     */
    public function addUser(User $user): Universe
    {
        $user->addUniverse($this);
        $this->users->add($user);

        return $this;
    }

    /**
     * @param User $user
     * @return Universe
     */
    public function removeUser(User $user): Universe
    {
        $this->users->removeElement($user);
        $user->removeUniverse($this);

        return $this;
    }
}
