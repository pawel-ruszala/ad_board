<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Images
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImageRepository")
 */
class Image
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
     * @ORM\Column(name="pathImage", type="string", length=255)
     */
    private $pathImage;

    /**
     * @ORM\ManyToOne(targetEntity="Advertisment", inversedBy="image")
     * @ORM\JoinColumn(name="advertisment_id", referencedColumnName="id")
     */
    private $advertisment;


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
     * Set pathImage
     *
     * @param string $pathImage
     * @return Image
     */
    public function setPathImage($pathImage)
    {
        $this->pathImage = $pathImage;

        return $this;
    }

    /**
     * Get pathImage
     *
     * @return string 
     */
    public function getPathImage()
    {
        return $this->pathImage;
    }

    /**
     * Set advertisment
     *
     * @param \AppBundle\Entity\Advertisment $advertisment
     * @return Image
     */
    public function setAdvertisment(\AppBundle\Entity\Advertisment $advertisment = null)
    {
        $this->advertisment = $advertisment;

        return $this;
    }

    /**
     * Get advertisment
     *
     * @return \AppBundle\Entity\Advertisment 
     */
    public function getAdvertisment()
    {
        return $this->advertisment;
    }
}
