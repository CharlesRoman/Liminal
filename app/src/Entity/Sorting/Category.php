<?php

namespace App\Entity\Sorting;

use App\Entity\Page\Page;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Category
 * @package App\Entity\Sorting
 * @ORM\Entity
 */
class Category extends AbstractSorting
{

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
        parent::__construct();
        $this->pages = new ArrayCollection();
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