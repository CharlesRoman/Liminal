<?php

namespace App\Model;

trait Activeable
{

    /**
     * @var bool
     * @ORM\Column(name="active", type="boolean")
     */
    protected $active;

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }
}
