<?php

namespace App\Entity\Sorting;

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
 * Class AbstractSorting
 * @package App\Entity\Sorting
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 */
class AbstractSorting
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Sorting\AbstractSorting")
     * @ORM\JoinColumns({ @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true) })
     * @var AbstractSorting|null
     */
    private $parent;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Universe\Universe", mappedBy="categories")
     * @var Collection
     */
    private $universes;

    /**
     * AbstractSorting constructor.
     */
    public function __construct()
    {
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
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return AbstractSorting|null
     */
    public function getParent(): ?AbstractSorting
    {
        return $this->parent;
    }

    /**
     * @param AbstractSorting|null $parent
     */
    public function setParent(?AbstractSorting $parent): void
    {
        $this->parent = $parent;
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
        $universe->addCategory($this);
        $this->universes->add($universe);
    }

    /**
     * @param Universe $universe
     * @return void
     */
    public function removeUniverse(Universe $universe): void
    {
        $this->universes->removeElement($universe);
        $universe->removeCategory($this);
    }

}