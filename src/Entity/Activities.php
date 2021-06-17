<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Activities
 *
 * @ORM\Table(name="activities", indexes={@ORM\Index(name="ID_type", columns={"ID_type"})})
 * @ORM\Entity
 */
#[ApiResource]
class Activities
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
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="locationLat", type="float", precision=10, scale=0, nullable=false)
     */
    private $locationlat;

    /**
     * @var float
     *
     * @ORM\Column(name="locationLng", type="float", precision=10, scale=0, nullable=false)
     */
    private $locationlng;

    /**
     * @var string
     *
     * @ORM\Column(name="listID_tags", type="string", length=255, nullable=false)
     */
    private $listidTags;

    /**
     * @var ActivitiesTypes
     *
     * @ORM\ManyToOne(targetEntity="ActivitiesTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_type", referencedColumnName="ID")
     * })
     */
    private $idType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLocationlat(): ?float
    {
        return $this->locationlat;
    }

    public function setLocationlat(float $locationlat): self
    {
        $this->locationlat = $locationlat;

        return $this;
    }

    public function getLocationlng(): ?float
    {
        return $this->locationlng;
    }

    public function setLocationlng(float $locationlng): self
    {
        $this->locationlng = $locationlng;

        return $this;
    }

    public function getListidTags(): ?string
    {
        return $this->listidTags;
    }

    public function setListidTags(string $listidTags): self
    {
        $this->listidTags = $listidTags;

        return $this;
    }

    public function getIdType(): ?ActivitiesTypes
    {
        return $this->idType;
    }

    public function setIdType(?ActivitiesTypes $idType): self
    {
        $this->idType = $idType;

        return $this;
    }


}
