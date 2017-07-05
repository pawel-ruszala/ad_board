<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="user")
     */
    private $advertisments;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Add advertisments
     *
     * @param \AppBundle\Entity\Category $advertisments
     * @return User
     */
    public function addAdvertisment(\AppBundle\Entity\Category $advertisments)
    {
        $this->advertisments[] = $advertisments;

        return $this;
    }

    /**
     * Remove advertisments
     *
     * @param \AppBundle\Entity\Category $advertisments
     */
    public function removeAdvertisment(\AppBundle\Entity\Category $advertisments)
    {
        $this->advertisments->removeElement($advertisments);
    }

    /**
     * Get advertisments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdvertisments()
    {
        return $this->advertisments;
    }
}
