<?php

namespace App\Entity\Menu;

use App\Model\Activeable;
use App\Model\Rankable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MenuPosition
 * @package App\Entity\Menu
 * @ORM\Entity
 * @ORM\Table(name="menu_position")
 */
class MenuPosition
{
    use Activeable;
    use Rankable;

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
     * @var string
     * @ORM\Column(name="label", type="string")
     */
    private $label;

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
}
