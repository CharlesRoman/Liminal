<?php

namespace App\Entity;

use App\Entity\Universe\Universe;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{

    use Timestampable;
    use SoftDeletable;

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="login", type="string", unique=true)
     * @Assert\NotBlank()
     */
    private $login;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @var string|null
     * @ORM\Column(name="password", type="string")
     */
    private $password;

    /**
     * @var array
     * @ORM\Column(name="roles", type="simple_array")
     */
    private $roles;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Universe\Universe", mappedBy="users")
     * @var Collection
     */
    private $universes;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->roles = [];
        $this->universes = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return void
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->login;
    }

    /**
     * @return string|null
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param string $password
     */
    public function setPlainPassword(string $password): void
    {
        $this->plainPassword = $password;

        // forces the object to look "dirty" to Doctrine. Avoids
        // Doctrine *not* saving this entity, if only plainPassword changes
        $this->password = null;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return null
     */
    public function getSalt()
    {
        // The bcrypt algorithm doesn't require a separate salt.
        return null;
    }

    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param string[] $roles
     * @return void
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return void
     */
    public function eraseCredentials(): void
    {
        $this->plainPassword = null;
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
     * @return void
     */
    public function addUniverse(Universe $universe): void
    {
        $universe->addUser($this);
        $this->universes->add($universe);
    }

    /**
     * @param Universe $universe
     * @return void
     */
    public function removeUniverse(Universe $universe): void
    {
        $this->universes->removeElement($universe);
        $universe->removeUser($this);
    }
}
