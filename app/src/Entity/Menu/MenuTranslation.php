<?php

namespace App\Entity\Menu;

use App\Model\StringableInterface;
use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MenuTranslation
 * @package App\Entity\Menu
 * @ORM\Entity
 */
class MenuTranslation implements StringableInterface
{
    use Translation;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $label;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $link;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $fontAwesomeIcon;

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return MenuTranslation
     */
    public function setLabel(string $label): MenuTranslation
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return MenuTranslation
     */
    public function setLink(string $link): MenuTranslation
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return string
     */
    public function getFontAwesomeIcon(): string
    {
        return $this->fontAwesomeIcon;
    }

    /**
     * @param string $fontAwesomeIcon
     * @return MenuTranslation
     */
    public function setFontAwesomeIcon(string $fontAwesomeIcon): MenuTranslation
    {
        $this->fontAwesomeIcon = $fontAwesomeIcon;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->getLabel();
    }
}
