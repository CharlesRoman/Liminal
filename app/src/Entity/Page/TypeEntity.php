<?php

namespace App\Entity\Page;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait TypeEntity
 * @package App\Entity\Page
 */
trait TypeEntity
{

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $label;

    /**
     * @var string
     * @ORM\Column(type="string", unique=true)
     */
    protected $code;

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
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return void
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->getLabel();
    }
}
