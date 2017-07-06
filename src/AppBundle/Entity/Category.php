<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="category")
     */
    private $advertisments;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="parent")
     * @ORM\JoinColumn(name="parent_adv_id", referencedColumnName="id")
     */
    private $parent;


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
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->advertisments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add advertisments
     *
     * @param \AppBundle\Entity\Category $advertisments
     * @return Category
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
     * Set parent
     *
     * @param \AppBundle\Entity\Category $parent
     * @return Category
     */
    public function setParent(\AppBundle\Entity\Category $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \AppBundle\Entity\Category 
     */
    public function getParent()
    {
        return $this->parent;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->name;
    }
}
