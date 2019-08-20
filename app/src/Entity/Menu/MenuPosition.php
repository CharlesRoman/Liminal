<?php

namespace App\Entity\Menu;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class MenuPosition
 * @package App\Entity\Menu
 * @ORM\Entity
 * @ORM\Table(name="menu_position")
 */
class MenuPosition
{
    const HEADER      = 1;
    const FOOTER      = 2;
    const CREDENTIALS = 3;

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(name="rank", type="integer")
     */
    private $rank;

    /**
     * @var string
     * @ORM\Column(name="label", type="string")
     */
    private $label;

    /**
     * @var bool
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return MenuPosition
     */
    public function setId(int $id): MenuPosition
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getRank(): int
    {
        return $this->rank;
    }

    /**
     * @param int $rank
     * @return MenuPosition
     */
    public function setRank(int $rank): MenuPosition
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return MenuPosition
     */
    public function setLabel(string $label): MenuPosition
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return MenuPosition
     */
    public function setActive(bool $active): MenuPosition
    {
        $this->active = $active;

        return $this;
    }
}