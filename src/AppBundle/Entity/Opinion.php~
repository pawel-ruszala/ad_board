<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Opinion
 *
 * @ORM\Table(name="opinion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OpinionRepository")
 */
class Opinion
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
     * @Assert\NotNull()
     * @Assert\Length(
     *     min=3,
     *     max=500
     * )
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=10)
     * @Assert\Choice({"Positive", "Neutral", "Negative"})
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="opinions")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="opinionBy")
     * @ORM\JoinColumn(name="by_user_id", referencedColumnName="id")
     */
    private $byUser;


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
     * @return Opinion
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
     * Set type
     *
     * @param string $type
     * @return Opinion
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Opinion
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Opinion
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
     * Set byUser
     *
     * @param \AppBundle\Entity\User $byUser
     * @return Opinion
     */
    public function setByUser(\AppBundle\Entity\User $byUser = null)
    {
        $this->byUser = $byUser;

        return $this;
    }

    /**
     * Get byUser
     *
     * @return \AppBundle\Entity\User 
     */
    public function getByUser()
    {
        return $this->byUser;
    }
}
