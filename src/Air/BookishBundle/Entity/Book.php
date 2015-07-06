<?php

namespace Air\BookishBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="books")
 */
class Book
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $ageGroup;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $contributor;

    /**
     * @ORM\Column(type="text", length=120)
     */
    private $contributorNote;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdDate;

    /**
     * @ORM\Column(type="text", length=120)
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $primaryIsbn13;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $primaryIsbn10;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $publisher;

    /**
     * @ORM\Column(type="integer", length=120)
     */
    private $rank;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedDate;

    /**
     * @ORM\ManyToMany(targetEntity="BestSellerList", mappedBy="books")
     */
    private $lists;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lists = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set ageGroup
     *
     * @param string $ageGroup
     * @return Book
     */
    public function setAgeGroup($ageGroup)
    {
        $this->ageGroup = $ageGroup;

        return $this;
    }

    /**
     * Get ageGroup
     *
     * @return string 
     */
    public function getAgeGroup()
    {
        return $this->ageGroup;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set contributor
     *
     * @param string $contributor
     * @return Book
     */
    public function setContributor($contributor)
    {
        $this->contributor = $contributor;

        return $this;
    }

    /**
     * Get contributor
     *
     * @return string 
     */
    public function getContributor()
    {
        return $this->contributor;
    }

    /**
     * Set contributorNote
     *
     * @param string $contributorNote
     * @return Book
     */
    public function setContributorNote($contributorNote)
    {
        $this->contributorNote = $contributorNote;

        return $this;
    }

    /**
     * Get contributorNote
     *
     * @return string 
     */
    public function getContributorNote()
    {
        return $this->contributorNote;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return Book
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Book
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
     * Set price
     *
     * @param string $price
     * @return Book
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set primaryIsbn13
     *
     * @param string $primaryIsbn13
     * @return Book
     */
    public function setPrimaryIsbn13($primaryIsbn13)
    {
        $this->primaryIsbn13 = $primaryIsbn13;

        return $this;
    }

    /**
     * Get primaryIsbn13
     *
     * @return string 
     */
    public function getPrimaryIsbn13()
    {
        return $this->primaryIsbn13;
    }

    /**
     * Set primaryIsbn10
     *
     * @param string $primaryIsbn10
     * @return Book
     */
    public function setPrimaryIsbn10($primaryIsbn10)
    {
        $this->primaryIsbn10 = $primaryIsbn10;

        return $this;
    }

    /**
     * Get primaryIsbn10
     *
     * @return string 
     */
    public function getPrimaryIsbn10()
    {
        return $this->primaryIsbn10;
    }

    /**
     * Set publisher
     *
     * @param string $publisher
     * @return Book
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return string 
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set rank
     *
     * @param integer $rank
     * @return Book
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return integer 
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Book
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
     * Set updatedDate
     *
     * @param \DateTime $updatedDate
     * @return Book
     */
    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }

    /**
     * Get updatedDate
     *
     * @return \DateTime 
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

    /**
     * Add lists
     *
     * @param \Air\BookishBundle\Entity\BestSellerList $lists
     * @return Book
     */
    public function addList(\Air\BookishBundle\Entity\BestSellerList $lists)
    {
        $this->lists[] = $lists;

        return $this;
    }

    /**
     * Remove lists
     *
     * @param \Air\BookishBundle\Entity\BestSellerList $lists
     */
    public function removeList(\Air\BookishBundle\Entity\BestSellerList $lists)
    {
        $this->lists->removeElement($lists);
    }

    /**
     * Get lists
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLists()
    {
        return $this->lists;
    }
}
