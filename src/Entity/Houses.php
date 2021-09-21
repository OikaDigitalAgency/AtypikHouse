<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Controller\HousesImageController;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;



/**
 * Houses
 *
 * @ORM\Table(name="houses", indexes={@ORM\Index(name="house_id_user", columns={"ID_user"})})
 * @ORM\Entity
 * @ApiFilter(SearchFilter::class, properties={"city":"exact"}))
 * @ApiFilter(DateFilter::class, properties={"dateDebut"}))
 * @ApiFilter(DateFilter::class, properties={"dateFin"}))
 * @ApiFilter(RangeFilter::class, properties={"nbbeds"}))
 * @ApiFilter(BooleanFilter::class, properties={"status"}))
 * @Vich\Uploadable()
 */

#[ApiResource(
    itemOperations: [
        'put',
        'delete',
        'get' =>[
           'normalization_context' =>['groups' =>['read:collection', 'read:item', 'read:Post']]
        ],
        /*requete image*/
        'image' =>[
            'method' => 'POST',
            'path' => '/houses/{id}/image',
            'deserialize' => false,
            'controller' => HousesImageController::class,
            'openapi_context' => [
                'requestBody' => [
                    'content' => [
                        'multipart/form-data' => [
                            'schema' => [
                                'type' => 'object',
                                'properties' => [
                                    'file' => [
                                        'type' => 'string',
                                        'format' => 'binary'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
),

]
class Houses
{

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
 * @var array
 *
 * @ORM\Column(name="listID_activities", type="array", nullable=false)
 */
    private $listidActivities;

/**
 * @var array
 *
 * @ORM\Column(name="listID_tags", type="array", nullable=false)
 */
    private $listidTags;

/**
 * @var \User
 *
 * @ORM\ManyToOne(targetEntity="User")
 * @ORM\JoinColumns({
 * @ORM\JoinColumn(name="ID_user", referencedColumnName="ID")
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

/**
 * @ORM\Column(type="array", nullable=true)
 */
    private $listIdEquipements = [];



/**
 * @ORM\Column(type="string", length=255)
 */
    private $categorie;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[Groups(['read:collection'])]
    private $filePath;


    public function __construct(){
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="house_image", fileNameProperty="filePath")
     */
    private $file;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;


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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getNbbeds(): ?int
    {
        return $this->nbbeds;
    }

    public function setNbbeds(int $nbbeds): self
    {
        $this->nbbeds = $nbbeds;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getTax(): ?int
    {
        return $this->tax;
    }

    public function setTax(int $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    public function getListidActivities(): ?array
    {
        return $this->listidActivities;
    }

    public function setListidActivities(array $listidActivities): self
    {
        $this->listidActivities = $listidActivities;

        return $this;
    }

    public function getListidTags(): ?array
    {
        return $this->listidTags;
    }

    public function setListidTags(array $listidTags): self
    {
        $this->listidTags = $listidTags;

        return $this;
    }



    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface$dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface$dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getListIdEquipements(): ?array
    {
        return $this->listIdEquipements;
    }

    public function setListIdEquipements(?array $listIdEquipements): self
    {
        $this->listIdEquipements = $listIdEquipements;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }


    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(?string $filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getFile(): ?File
    {
        return $this->file;
    }

    /**
     * @param File|null $file
     * @return Houses
     */
    public function setFile(?File $file): Houses
    {
        $this->file = $file;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }



}
