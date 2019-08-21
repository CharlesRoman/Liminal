<?php

namespace App\Entity\Page;

use App\Model\StringableInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class BlockType
 * @package App\Entity\Page
 * @ORM\Entity
 */
class PageType implements StringableInterface, TypeEntityInterface
{
    use TypeEntity;

    const SIMPLE  = 'simple';
    const COMPLEX = 'complex';

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Page\Page", mappedBy="pageType")
     * @var Collection
     */
    private $pages;

    /**
     * PageType constructor.
     */
    public function __construct()
    {
        $this->pages = new ArrayCollection();
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
     * @return Collection
     */
    public function getPages(): Collection
    {
        return $this->pages;
    }

    /**
     * @param Collection $pages
     * @return void
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
        $page->setPageType($this);
        $this->pages->add($page);
    }

    /**
     * @param Page $page
     * @return void
     */
    public function removePage(Page $page): void
    {
        $this->pages->removeElement($page);
        $page->setPageType(null);
    }
}
