<?php

namespace App\Entity\Page;

use App\Model\StringableInterface;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class RowTranslation
 * @package App\Entity\Page
 * @ORM\Entity
 */
class RowTranslation implements StringableInterface
{
    use Translation;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png", "image/gif" })
     */
    private $backgroundImage;

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getBackgroundImage(): ?string
    {
        return $this->backgroundImage;
    }

    /**
     * @param string|null $backgroundImage
     */
    public function setBackgroundImage(?string $backgroundImage): void
    {
        $this->backgroundImage = $backgroundImage;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->getTitle();
    }
}