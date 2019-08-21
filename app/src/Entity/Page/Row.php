<?php

namespace App\Entity\Page;

use App\Model\Activeable;
use App\Model\Rankable;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;

/**
 * Class Row
 * @package App\Entity\Page
 * @ORM\Entity
 */
class Row
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
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    private $backgroundColor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Page\Page")
     * @ORM\JoinColumns({ @ORM\JoinColumn(name="page_id", referencedColumnName="id", nullable=true) })
     * @var Page|null
     */
    private $page;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Page\RowType")
     * @ORM\JoinColumns({ @ORM\JoinColumn(name="row_type_id", referencedColumnName="id", nullable=true) })
     * @var RowType|null
     */
    private $rowType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Page\Block", mappedBy="row")
     * @var Collection
     */
    private $blocks;

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
     * @return string|null
     */
    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string|null $backgroundColor
     */
    public function setBackgroundColor(?string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return Page|null
     */
    public function getPage(): ?Page
    {
        return $this->page;
    }

    /**
     * @param Page|null $page
     */
    public function setPage(?Page $page): void
    {
        $this->page = $page;
    }

    /**
     * @return RowType|null
     */
    public function getRowType(): ?RowType
    {
        return $this->rowType;
    }

    /**
     * @param RowType|null $rowType
     */
    public function setRowType(?RowType $rowType): void
    {
        $this->rowType = $rowType;
    }

    /**
     * @return Collection
     */
    public function getBlocks(): Collection
    {
        return $this->blocks;
    }

    /**
     * @param Collection $blocks
     */
    public function setBlocks(Collection $blocks): void
    {
        $this->blocks = $blocks;
    }


    /**
     * @param Block $block
     * @return void
     */
    public function addBlock(Block $block): void
    {
        $block->setRow($this);
        $this->blocks->add($block);
    }

    /**
     * @param Block $block
     * @return void
     */
    public function removeBlock(Block $block): void
    {
        $this->blocks->removeElement($block);
        $block->setRow(null);
    }
}