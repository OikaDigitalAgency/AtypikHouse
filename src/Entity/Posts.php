<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * Posts
 *
 * @ORM\Table(name="posts", indexes={@ORM\Index(name="post_id_house", columns={"ID_house"}), @ORM\Index(name="post_id_user", columns={"author"}) })
 * @ORM\Entity
 */
#[ApiResource]
class Posts implements \Serializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255, nullable=false)
     */
    private $content;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="publishDate", type="datetime", nullable=false)
     */
    private  $publishDate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $published = false;

    /**
     * @var Houses
     *
     * @ORM\ManyToOne(targetEntity="Houses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_house", referencedColumnName="ID")
     * })
     */
    private $idHouse;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="author", referencedColumnName="ID")
     * })
     */
    private $author;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return DateTime
     */
    public function getPublishDate(): DateTime
    {
        return $this->publishDate;
    }

    /**
     * @param \DateTime $publishDate
     */
    public function setPublishDate(\DateTime $publishDate): void
    {
        $this->publishDate = $publishDate;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->published;
    }

    /**
     * @param bool $published
     */
    public function setPublished(bool $published): void
    {
        $this->published = $published;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setAuthor(User $author): void
    {
        $this->author = $author;
    }

    public function getIdHouse(): ?Houses
    {
        return $this->idHouse;
    }

    public function setIdHouse(?Houses $idHouse): self
    {
        $this->idHouse = $idHouse;

        return $this;
    }

    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    public function unserialize($data)
    {
        // TODO: Implement unserialize() method.
    }
}
