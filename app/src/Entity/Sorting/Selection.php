<?php

namespace App\Entity\Sorting;

use App\Entity\Page\Page;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Selection
 * @package App\Entity\Sorting
 * @ORM\Entity
 */
class Selection extends AbstractSorting
{

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Page\Page", inversedBy="selections")
     * @ORM\JoinTable(name="page_selection")
     * @var Collection
     */
    private $pages;

    /**
     * Selection constructor.
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
        $page->addSelection($this);
        $this->pages->add($page);
    }

    /**
     * @param Page $page
     * @return void
     */
    public function removePage(Page $page): void
    {
        $this->pages->removeElement($page);
        $page->removeSelection($this);
    }
}