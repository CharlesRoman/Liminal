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
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    private $link;

    /**
     * @var string|null
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
     * @return void
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     */
    public function setLink(?string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return string|null
     */
    public function getFontAwesomeIcon(): ?string
    {
        return $this->fontAwesomeIcon;
    }

    /**
     * @param string|null $fontAwesomeIcon
     */
    public function setFontAwesomeIcon(?string $fontAwesomeIcon): void
    {
        $this->fontAwesomeIcon = $fontAwesomeIcon;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->getLabel();
    }
}
