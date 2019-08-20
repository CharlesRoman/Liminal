<?php

namespace App\Entity\Page;

use App\Model\StringableInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class BlockType
 * @package App\Entity\Page
 * @ORM\Entity
 */
class RowType implements StringableInterface, TypeEntityInterface
{
    use TypeEntity;

    const NORMAL = 'normal';
    const BANNER = 'banner';

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
