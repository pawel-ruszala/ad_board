<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Advertisments
 *
 * @ORM\Table(name="advertisment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdvertismentRepository")
 */
class Advertisment
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
     * @ORM\Column(name="text", type="text")
     * @Assert\Length(
     *     min=30
     * )
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     * @Assert\DateTime()
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expired_date", type="datetime")
     * @Assert\DateTime()
     */
    private $expiredDate;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string")
     * @Assert\Length(
     *     min=5,
     *     max=100,
     *     minMessage="Your title must be at least {{limit}} characters long.",
     *     maxMessage="Your title cannot be longer than {{limit}} characters long."
     *     )
     */
    private $title;

    /**
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @ORM\Column(name="cond", type="string")
     * @Assert\Choice({"new", "used"})
     */
    private $cond;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="advertisment")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="advertisments");
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * @Assert\NotNull()
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="advertisment")
     */
    private $images;


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
     * Set text
     *
     * @param string $text
     * @return Advertisment
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Advertisment
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set expiredDate
     *
     * @param \DateTime $expiredDate
     * @return Advertisment
     */
    public function setExpiredDate($expiredDate)
    {
        $this->expiredDate = $expiredDate;

        return $this;
    }

    /**
     * Get expiredDate
     *
     * @return \DateTime 
     */
    public function getExpiredDate()
    {
        return $this->expiredDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setCreationDate(new \DateTime());
        $this->setExpiredDate(new \DateTime('now + 1 month'));

        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Advertisment
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     * @return Advertisment
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add images
     *
     * @param \AppBundle\Entity\Image $images
     * @return Advertisment
     */
    public function addImage(\AppBundle\Entity\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \AppBundle\Entity\Image $images
     */
    public function removeImage(\AppBundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Advertisment
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * Set price
     *
     * @param integer $price
     * @return Advertisment
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }


    /**
     * Set cond
     *
     * @param string $cond
     * @return Advertisment
     */
    public function setCond($cond)
    {
        $this->cond = $cond;

        return $this;
    }

    /**
     * Get cond
     *
     * @return string 
     */
    public function getCond()
    {
        return $this->cond;
    }
}
