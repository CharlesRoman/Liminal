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
class RowType implements StringableInterface, TypeEntityInterface
{
    use TypeEntity;

    const NORMAL = 'normal';
    const BANNER = 'banner';

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Page\Row", mappedBy="rowType")
     * @var Collection
     */
    private $rows;

    /**
     * RowType constructor.
     */
    public function __construct()
    {
        $this->rows = new ArrayCollection();
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
        $row->setRowType($this);
        $this->rows->add($row);
    }

    /**
     * @param Row $row
     * @return void
     */
    public function removeRow(Row $row): void
    {
        $this->rows->removeElement($row);
        $row->setRowType(null);
    }
}
