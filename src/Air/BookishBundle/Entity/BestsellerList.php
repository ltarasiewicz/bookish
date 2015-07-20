<?php

namespace Air\BookishBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bestseller_lists")
 */
class BestsellerList
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $listId;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $listName;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $displayName;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $updated;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $listImage;

    /**
     * @ORM\ManyToMany(targetEntity="Book")
     * @ORM\JoinTable(name="lists_books",
     *      joinColumns={@ORM\JoinColumn(name="list_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="book_id", referencedColumnName="id", unique=true)}
     *      )
     **/
    private $books;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set listId
     *
     * @param string $listId
     * @return BestSellerList
     */
    public function setListId($listId)
    {
        $this->listId = $listId;

        return $this;
    }

    /**
     * Get listId
     *
     * @return string
     */
    public function getListId()
    {
        return $this->listId;
    }

    /**
     * Set listName
     *
     * @param string $listName
     * @return BestSellerList
     */
    public function setListName($listName)
    {
        $this->listName = $listName;

        return $this;
    }

    /**
     * Get listName
     *
     * @return string 
     */
    public function getListName()
    {
        return $this->listName;
    }

    /**
     * Set displayName
     *
     * @param string $displayName
     * @return BestSellerList
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set updated
     *
     * @param string $updated
     * @return BestSellerList
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return string 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set listImage
     *
     * @param string $listImage
     * @return BestSellerList
     */
    public function setListImage($listImage)
    {
        $this->listImage = $listImage;

        return $this;
    }

    /**
     * Get listImage
     *
     * @return string 
     */
    public function getListImage()
    {
        return $this->listImage;
    }

    /**
     * Add books
     *
     * @param \Air\BookishBundle\Entity\Book $books
     * @return BestSellerList
     */
    public function addBook(\Air\BookishBundle\Entity\Book $books)
    {
        $this->books[] = $books;

        return $this;
    }

    /**
     * Remove books
     *
     * @param \Air\BookishBundle\Entity\Book $books
     */
    public function removeBook(\Air\BookishBundle\Entity\Book $books)
    {
        $this->books->removeElement($books);
    }

    /**
     * Get books
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBooks()
    {
        return $this->books;
    }
}
