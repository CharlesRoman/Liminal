<?php

namespace App\Model;

trait Rankable
{
    /**
     * @var int
     * @ORM\Column(name="rank", type="integer")
     */
    protected $rank;

    /**
     * @return int
     */
    public function getRank(): int
    {
        return $this->rank;
    }

    /**
     * @param int $rank
     * @return void
     */
    public function setRank(int $rank): void
    {
        $this->rank = $rank;
    }
}
