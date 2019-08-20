<?php

namespace App\Entity\Page;

/**
 * Interface TypeEntityInterface
 * @package App\Entity\Page
 */
interface TypeEntityInterface
{
    /**
     * @return string
     */
    public function getLabel(): string;

    /**
     * @param string $label
     * @return void
     */
    public function setLabel(string $label): void;

    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @param string $code
     * @return void
     */
    public function setCode(string $code): void;
}