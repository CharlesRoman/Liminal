<?php

namespace App\Entity\Sorting;

use App\Entity\Page\Page;
use App\Entity\Universe\Universe;
use App\Model\Activeable;
use App\Model\Rankable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Category
 * @package App\Entity\Sorting
 * @ORM\Entity
 */
class Category
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Sorting\Category")
     * @ORM\JoinColumns({ @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true) })
     * @var Category|null
     */
    private $parent;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Universe\Universe", mappedBy="categories")
     * @var Collection
     */
    private $universes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Page\Page", mappedBy="category")
     * @var Collection
     */
    private $pages;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->universes = new ArrayCollection();
        $this->pages     = new ArrayCollection();
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
     * @return Category|null
     */
    public function getParent(): ?Category
    {
        return $this->parent;
    }

    /**
     * @param Category|null $parent
     */
    public function setParent(?Category $parent): void
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

    /**
     * @return Collection
     */
    public function getPages(): Collection
    {
        return $this->pages;
    }

    /**
     * @param Collection $pages
     */
    public function setPages(Collection $pages): void
    {
        $this->pages = $pages;
    }


    /**
     * @param Page $page
     * @return void
     */
    public function addPage(Page $page): void
    {
        $page->setCategory($this);
        $this->pages->add($page);
    }

    /**
     * @param Page $page
     * @return void
     */
    public function removePage(Page $page): void
    {
        $this->pages->removeElement($page);
        $page->setCategory(null);
    }
}