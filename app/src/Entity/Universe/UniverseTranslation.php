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
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png", "image/gif" })
     */
    private $logo;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png", "image/gif" })
     */
    private $banner;

    /**
     * @var string|null
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
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getLogo(): ?string
    {
        return $this->logo;
    }

    /**
     * @param string|null $logo
     * @return void
     */
    public function setLogo(?string $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return string|null
     */
    public function getBanner(): ?string
    {
        return $this->banner;
    }

    /**
     * @param string|null $banner
     * @return void
     */
    public function setBanner(?string $banner): void
    {
        $this->banner = $banner;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return void
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->getName();
    }
}
