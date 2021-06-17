<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Posts
 *
 * @ORM\Table(name="posts", indexes={@ORM\Index(name="post_id_user_to", columns={"ID_userTo"}), @ORM\Index(name="post_id_house", columns={"ID_house"}), @ORM\Index(name="post_id_user_from", columns={"ID_userFrom"})})
 * @ORM\Entity
 */
#[ApiResource]
class Posts
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=false)
     */
    private $message;

    /**
     * @var \Houses
     *
     * @ORM\ManyToOne(targetEntity="Houses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_house", referencedColumnName="ID")
     * })
     */
    private $idHouse;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_userFrom", referencedColumnName="ID")
     * })
     */
    private $idUserfrom;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_userTo", referencedColumnName="ID")
     * })
     */
    private $idUserto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
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

    public function getIdUserfrom(): ?User
    {
        return $this->idUserfrom;
    }

    public function setIdUserfrom(?User $idUserfrom): self
    {
        $this->idUserfrom = $idUserfrom;

        return $this;
    }

    public function getIdUserto(): ?User
    {
        return $this->idUserto;
    }

    public function setIdUserto(?User $idUserto): self
    {
        $this->idUserto = $idUserto;

        return $this;
    }


}
