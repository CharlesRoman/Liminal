<?php

namespace App\Entity\Page;

use App\Model\StringableInterface;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class BlockTranslation
 * @package App\Entity\Page
 * @ORM\Entity
 */
class BlockTranslation implements StringableInterface
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
    private $title;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png", "image/gif" })
     */
    private $image;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    private $linkLabel;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    private $linkUrl;

    /**
     * @return string
     */
    public function __toString(): string
    {
        // TODO: Implement __toString() method.
    }
}