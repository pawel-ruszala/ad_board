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

    /**
     * @ORM\OneToMany(targetEntity="Opinion", mappedBy="user")
     */
    private $opinions;

    /**
     * @ORM\OneToMany(targetEntity="Opinion", mappedBy="byUser")
     */
    private $opinionBy;

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

    /**
     * Add opinions
     *
     * @param \AppBundle\Entity\Opinion $opinions
     * @return User
     */
    public function addOpinion(\AppBundle\Entity\Opinion $opinions)
    {
        $this->opinions[] = $opinions;

        return $this;
    }

    /**
     * Remove opinions
     *
     * @param \AppBundle\Entity\Opinion $opinions
     */
    public function removeOpinion(\AppBundle\Entity\Opinion $opinions)
    {
        $this->opinions->removeElement($opinions);
    }

    /**
     * Get opinions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOpinions()
    {
        return $this->opinions;
    }

    /**
     * Set opinionBy
     *
     * @param \AppBundle\Entity\Opinion $opinionBy
     * @return User
     */
    public function setOpinionBy(\AppBundle\Entity\Opinion $opinionBy = null)
    {
        $this->opinionBy = $opinionBy;

        return $this;
    }

    /**
     * Get opinionBy
     *
     * @return \AppBundle\Entity\Opinion 
     */
    public function getOpinionBy()
    {
        return $this->opinionBy;
    }

    /**
     * Add opinionBy
     *
     * @param \AppBundle\Entity\Opinion $opinionBy
     * @return User
     */
    public function addOpinionBy(\AppBundle\Entity\Opinion $opinionBy)
    {
        $this->opinionBy[] = $opinionBy;

        return $this;
    }

    /**
     * Remove opinionBy
     *
     * @param \AppBundle\Entity\Opinion $opinionBy
     */
    public function removeOpinionBy(\AppBundle\Entity\Opinion $opinionBy)
    {
        $this->opinionBy->removeElement($opinionBy);
    }
}
