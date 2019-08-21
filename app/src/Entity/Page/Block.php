<?php

namespace App\Entity\Page;

use App\Model\Activeable;
use App\Model\Rankable;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;

/**
 * Class Block
 * @package App\Entity\Page
 * @ORM\Entity
 */
class Block
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Page\Row")
     * @ORM\JoinColumns({ @ORM\JoinColumn(name="row_id", referencedColumnName="id", nullable=true) })
     * @var Row|null
     */
    private $row;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Page\Width")
     * @ORM\JoinColumns({ @ORM\JoinColumn(name="width_id", referencedColumnName="id", nullable=true) })
     * @var Width|null
     */
    private $width;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Page\BlockType")
     * @ORM\JoinColumns({ @ORM\JoinColumn(name="block_type_id", referencedColumnName="id", nullable=true) })
     * @var BlockType|null
     */
    private $blockType;

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
     * @return Row|null
     */
    public function getRow(): ?Row
    {
        return $this->row;
    }

    /**
     * @param Row|null $row
     */
    public function setRow(?Row $row): void
    {
        $this->row = $row;
    }

    /**
     * @return BlockType|null
     */
    public function getBlockType(): ?BlockType
    {
        return $this->blockType;
    }

    /**
     * @param BlockType|null $blockType
     */
    public function setBlockType(?BlockType $blockType): void
    {
        $this->blockType = $blockType;
    }

    /**
     * @return Width|null
     */
    public function getWidth(): ?Width
    {
        return $this->width;
    }

    /**
     * @param Width|null $width
     */
    public function setWidth(?Width $width): void
    {
        $this->width = $width;
    }
}