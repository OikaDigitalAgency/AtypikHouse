<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(

    itemOperations:[
        'put',
        'delete',
        'patch',
        'get' => ['normalization_context' => ['groups' => ['read:collection', 'read:item', 'read:Post']]],
        'get' => ['path' => '/houses/{id}', 'requirements' => ['id' => '\d+']],
    ],

),
]
/**
 * Houses
 *
 * @ORM\Table(name="houses", indexes={@ORM\Index(name="house_id_category", columns={"ID_category"}), @ORM\Index(name="house_id_user", columns={"ID_user"})})
 * @ORM\Entity
 * @ApiFilter(SearchFilter::class, properties={"city"}))
 * @ApiFilter(DateFilter::class, properties={"dateFin"}))
 * @ApiFilter(RangeFilter::class, properties={"nbbeds"}))
 */
    class Houses
{
        #[Groups(['search'])]

/**
 * @var int
 *
 * @ORM\Column(name="ID", type="integer", nullable=false)
 * @ORM\Id
 * @ORM\GeneratedValue(strategy="IDENTITY")
 *
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
 * @var string
 *
 * @ORM\Column(name="address", type="string", length=255, nullable=false)
 */
    private $address;

/**
 * @var int
 *
 * @ORM\Column(name="zipcode", type="integer", nullable=false)
 */
    private $zipcode;

/**
 * @var string
 *
 * @ORM\Column(name="city", type="string", length=255, nullable=false)
 */
    private $city;

/**
 * @var bool
 *
 * @ORM\Column(name="status", type="boolean", nullable=false)
 */
    private $status;

/**
 * @var int
 *
 * @ORM\Column(name="nbBeds", type="integer", nullable=false)
 */
    private $nbbeds;

/**
 * @var int
 *
 * @ORM\Column(name="price", type="integer", nullable=false)
 */
    private $price;

/**
 * @var int
 *
 * @ORM\Column(name="tax", type="integer", nullable=false)
 */
    private $tax;

/**
 * @var string
 *
 * @ORM\Column(name="listID_activities", type="string", length=255, nullable=false)
 */
    private $listidActivities;

/**
 * @var string
 *
 * @ORM\Column(name="listID_tags", type="string", length=255, nullable=false)
 */
    private $listidTags;

/**
 * @var string
 *
 * @ORM\Column(name="listID_pics", type="string", length=255, nullable=false)
 */
    private $listidPics;

/**
 * @var \Categories
 *
 * @ORM\ManyToOne(targetEntity="Categories")
 * @ORM\JoinColumns({
 *   @ORM\JoinColumn(name="ID_category", referencedColumnName="ID")
 * })
 */
    private $idCategory;

/**
 * @var \User
 *
 * @ORM\ManyToOne(targetEntity="User")
 * @ORM\JoinColumns({
 *   @ORM\JoinColumn(name="ID_user", referencedColumnName="ID")
 * })
 */
    private $idUser;

/**
 * @ORM\Column(type="datetime", nullable=true)
 */
    private $dateDebut;

/**
 * @ORM\Column(type="datetime", nullable=true)
 */
    private $dateFin;

    function getId(): ?int
    {
        return $this->id;
    }

    function getTitle(): ?string
    {
        return $this->title;
    }

    function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    function getDescription(): ?string
    {
        return $this->description;
    }

    function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    function getAddress(): ?string
    {
        return $this->address;
    }

    function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    function setZipcode(int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    function getCity(): ?string
    {
        return $this->city;
    }

    function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    function getStatus(): ?bool
    {
        return $this->status;
    }

    function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    function getNbbeds(): ?int
    {
        return $this->nbbeds;
    }

    function setNbbeds(int $nbbeds): self
    {
        $this->nbbeds = $nbbeds;

        return $this;
    }

    function getPrice(): ?int
    {
        return $this->price;
    }

    function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    function getTax(): ?int
    {
        return $this->tax;
    }

    function setTax(int $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    function getListidActivities(): ?string
    {
        return $this->listidActivities;
    }

    function setListidActivities(string $listidActivities): self
    {
        $this->listidActivities = $listidActivities;

        return $this;
    }

    function getListidTags(): ?string
    {
        return $this->listidTags;
    }

    function setListidTags(string $listidTags): self
    {
        $this->listidTags = $listidTags;

        return $this;
    }

    function getListidPics(): ?string
    {
        return $this->listidPics;
    }

    function setListidPics(string $listidPics): self
    {
        $this->listidPics = $listidPics;

        return $this;
    }

    function getIdCategory(): ?Categories
    {
        return $this->idCategory;
    }

    function setIdCategory(?Categories $idCategory): self
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    function getIdUser(): ?User
    {
        return $this->idUser;
    }

    function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    function setDateDebut(?\DateTimeInterface$dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    function setDateFin(?\DateTimeInterface$dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

}
