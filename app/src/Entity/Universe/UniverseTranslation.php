<?php

namespace App\Entity\Universe;

use App\Model\StringableInterface;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UniverseTranslation
 * @package App\Entity\Universe
 * @ORM\Entity
 */
class UniverseTranslation implements StringableInterface
{
    use Translation;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png", "image/gif" })
     */
    private $logo;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png", "image/gif" })
     */
    private $banner;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UniverseTranslation
     */
    public function setName(string $name): UniverseTranslation
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     * @return UniverseTranslation
     */
    public function setLogo(string $logo): UniverseTranslation
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return string
     */
    public function getBanner(): string
    {
        return $this->banner;
    }

    /**
     * @param string $banner
     * @return UniverseTranslation
     */
    public function setBanner(string $banner): UniverseTranslation
    {
        $this->banner = $banner;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return UniverseTranslation
     */
    public function setDescription(string $description): UniverseTranslation
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->getName();
    }
}
