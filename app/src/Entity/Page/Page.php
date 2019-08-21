<?php

namespace App\Entity\Page;

use App\Entity\Sorting\Category;
use App\Entity\Sorting\Selection;
use App\Entity\Universe\Universe;
use App\Entity\User;
use App\Model\Activeable;
use App\Model\Rankable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;

/**
 * Class Page
 * @package App\Entity\Page
 * @ORM\Entity
 */
class Page
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Page\PageType")
     * @ORM\JoinColumns({ @ORM\JoinColumn(name="page_type_id", referencedColumnName="id", nullable=true) })
     * @var PageType|null
     */
    private $pageType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumns({ @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true) })
     * @var User|null
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Universe\Universe", mappedBy="pages")
     * @var Collection
     */
    private $universes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Page\Row", mappedBy="page")
     * @var Collection
     */
    private $rows;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sorting\Category")
     * @ORM\JoinColumns({ @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=true) })
     * @var Category|null
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Sorting\Selection", mappedBy="pages")
     * @var Collection
     */
    private $selections;

    /**
     * Page constructor.
     */
    public function __construct()
    {
        $this->universes  = new ArrayCollection();
        $this->rows       = new ArrayCollection();
        $this->selections = new ArrayCollection();
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
     * @return PageType|null
     */
    public function getPageType(): ?PageType
    {
        return $this->pageType;
    }

    /**
     * @param PageType|null $pageType
     * @return void
     */
    public function setPageType(?PageType $pageType): void
    {
        $this->pageType = $pageType;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return void
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
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
        $universe->addPage($this);
        $this->universes->add($universe);
    }

    /**
     * @param Universe $universe
     * @return void
     */
    public function removeUniverse(Universe $universe): void
    {
        $this->universes->removeElement($universe);
        $universe->removePage($this);
    }

    /**
     * @return Collection
     */
    public function getRows(): Collection
    {
        return $this->rows;
    }

    /**
     * @param Collection $rows
     */
    public function setRows(Collection $rows): void
    {
        $this->rows = $rows;
    }

    /**
     * @param Row $row
     * @return void
     */
    public function addRow(Row $row): void
    {
        $row->setPage($this);
        $this->rows->add($row);
    }

    /**
     * @param Row $row
     * @return void
     */
    public function removeRow(Row $row): void
    {
        $this->rows->removeElement($row);
        $row->setPage(null);
    }

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     */
    public function setCategory(?Category $category): void
    {
        $this->category = $category;
    }

    /**
     * @return Collection
     */
    public function getSelections(): Collection
    {
        return $this->selections;
    }

    /**
     * @param Collection $selections
     */
    public function setSelections(Collection $selections): void
    {
        $this->selections = $selections;
    }

    /**
     * @param Selection $selection
     */
    public function addSelection(Selection $selection): void
    {
        $selection->addPage($this);
        $this->selections->add($selection);
    }

    /**
     * @param Selection $selection
     * @return void
     */
    public function removeSelection(Selection $selection): void
    {
        $this->selections->removeElement($selection);
        $selection->removePage($this);
    }
}