<?php

namespace App\Model;

/**
 * Interface StringableInterface
 * @package App\Model
 */
interface StringableInterface
{
    /**
     * @return string
     */
    public function __toString(): string;
}
