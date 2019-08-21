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
class BlockType implements StringableInterface, TypeEntityInterface
{
    use TypeEntity;

    const TEXT  = 'block-text';
    const IMAGE = 'block-image';

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Page\Block", mappedBy="blockType")
     * @var Collection
     */
    private $blocks;

    /**
     * BlockType constructor.
     */
    public function __construct()
    {
        $this->blocks = new ArrayCollection();
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
        $block->setBlockType($this);
        $this->blocks->add($block);
    }

    /**
     * @param Block $block
     * @return void
     */
    public function removeBlock(Block $block): void
    {
        $this->blocks->removeElement($block);
        $block->setBlockType(null);
    }
}
