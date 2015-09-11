<?php

namespace AppBundle\Entity;

use Clastic\NodeBundle\Node\NodeReferenceInterface;
use Clastic\NodeBundle\Node\NodeReferenceTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Shop
 */
class Shop implements NodeReferenceInterface
{
    use NodeReferenceTrait;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var string
     */
    private $description;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var ArrayCollection
     */
    private $campuses;


    public function __construct() {
        $this->campuses = new ArrayCollection();
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
     * Set logo
     *
     * @param string $logo
     * @return Shop
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Shop
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set address
     *
     * @param Address $address
     * @return Shop
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set campuses
     *
     * @param Campus[] $campuses
     * @return Shop
     */
    public function setCampuses($campuses)
    {
        $this->campuses = $campuses;

        return $this;
    }

    /**
     * Get campuses
     *
     * @return Campus[]
     */
    public function getCampuses()
    {
        return $this->campuses;
    }

    /**
     * Return the readable name.
     */
    function __toString()
    {
        return $this->getNode()->getTitle();
    }
}
