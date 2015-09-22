<?php

namespace AppBundle\Entity;

use Clastic\UserBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Topup
 */
class Topup
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var Campus
     */
    private $campus;

    /**
     * @var User
     */
    private $user;

    /**
     * Topup constructor.
     */
    public function __construct()
    {
        $this->created = new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Topup
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Topup
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set campus
     *
     * @param Campus $campus
     * @return Topup
     */
    public function setCampus($campus)
    {
        $this->campus = $campus;

        return $this;
    }

    /**
     * Get campus
     *
     * @return Campus
     */
    public function getCampus()
    {
        return $this->campus;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return Topup
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
