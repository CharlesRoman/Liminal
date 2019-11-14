<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class AbstractService
 * @package App\Service
 */
abstract class AbstractService
{
    /** @var EntityManagerInterface */
    protected $em;

    /** @var RequestStack */
    protected $rs;

    /**
     * AbstractService constructor.
     * @param EntityManagerInterface $em
     * @param RequestStack $rs
     */
    public function __construct(EntityManagerInterface $em, RequestStack $rs)
    {
        $this->em = $em;
        $this->rs = $rs;
    }
}