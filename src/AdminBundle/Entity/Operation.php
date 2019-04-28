<?php

namespace App\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Array_;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\OperationRepository")
 */
class Operation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $operation_name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $operation_relance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $operation_code;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $operation_object;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"Light"})
     */
    private $operation_url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $operation_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $operation_img_haut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $operation_img_lateral;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $operation_genre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $operation_prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $operation_metier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $operation_fonction;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $operation_tel;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $operation_fixe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $operation_email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $operation_photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $operation_linkedin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $operation_newsletter;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $operation_offresCommerciales;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\User", inversedBy="author")
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\TypeOperation", inversedBy="operations")
     */
    private $type_operation;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Participate", mappedBy="operation_participate")
     */
    private $participates;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $operation_envoiDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $operation_dateCloture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $operation_note;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Parameter", mappedBy="param_operation")
     */
    private $parameters;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\User", inversedBy="author")
     */
    private $operation_author;

    public function __construct()
    {
        $this->participates = new ArrayCollection();
        $this->parameters = new ArrayCollection();
        $this->companies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOperationName(): ?string
    {
        return $this->operation_name;
    }

    public function setOperationName(string $operation_name): self
    {
        $this->operation_name = $operation_name;

        return $this;
    }

    public function getOperationObject(): ?string
    {
        return $this->operation_object;
    }

    public function setOperationObject(string $operation_object): self
    {
        $this->operation_object = $operation_object;

        return $this;
    }

    public function getOperationCode(): ?string
    {
        return $this->operation_code;
    }

    public function setOperationCode(string $operation_code): self
    {
        $this->operation_code = $operation_code;

        return $this;
    }

    public function getOperationRelance(): ?int
    {
        return $this->operation_relance;
    }

    public function setOperationRelance(?int $operation_relance): self
    {
        $this->operation_relance = $operation_relance;

        return $this;
    }

    public function getOperationEnvoiDate(): ?\DateTimeInterface
    {
        return $this->operation_envoiDate;
    }

    public function setOperationEnvoiDate(\DateTimeInterface $operation_envoiDate): self
    {
        $this->operation_envoiDate = $operation_envoiDate;

        return $this;
    }

    public function getOperationDateCloture(): ?\DateTimeInterface
    {
        return $this->operation_dateCloture;
    }

    public function setOperationDateCloture(?\DateTimeInterface $operation_dateCloture): self
    {
        $this->operation_dateCloture = $operation_dateCloture;

        return $this;
    }

    public function getOperationNote(): ?string
    {
        return $this->operation_note;
    }

    public function setOperationNote(?string $operation_note): self
    {
        $this->operation_note = $operation_note;

        return $this;
    }

    public function getOperationUrl(): ?string
    {
        return $this->operation_url;
    }

    public function setOperationUrl(string $operation_url): self
    {
        $this->operation_url = $operation_url;

        return $this;
    }

    public function getOperationType(): ?string
    {
        return $this->operation_type;
    }

    public function setOperationType(string $operation_type): self
    {
        $this->operation_type = $operation_type;

        return $this;
    }

    public function getOperationImgHaut(): ?string
    {
        return $this->operation_img_haut;
    }

    public function setOperationImgHaut(?string $operation_img_haut): self
    {
        $this->operation_img_haut = $operation_img_haut;

        return $this;
    }

    public function getOperationImgLateral(): ?string
    {
        return $this->operation_img_lateral;
    }

    public function setOperationImgLateral(?string $operation_img_lateral): self
    {
        $this->operation_img_lateral = $operation_img_lateral;

        return $this;
    }

    public function getOperationGenre(): ?string
    {
        return $this->operation_genre;
    }

    public function setOperationGenre(?string $operation_genre): self
    {
        $this->operation_genre = $operation_genre;

        return $this;
    }

    public function getOperationPrenom(): ?string
    {
        return $this->operation_prenom;
    }

    public function setOperationPrenom(?string $operation_prenom): self
    {
        $this->operation_prenom = $operation_prenom;

        return $this;
    }

    public function getOperationMetier(): ?string
    {
        return $this->operation_metier;
    }

    public function setOperationMetier(?string $operation_metier): self
    {
        $this->operation_metier = $operation_metier;

        return $this;
    }

    public function getOperationFonction(): ?string
    {
        return $this->operation_fonction;
    }

    public function setOperationFonction(?string $operation_fonction): self
    {
        $this->operation_fonction = $operation_fonction;

        return $this;
    }

    public function getOperationTel(): ?string
    {
        return $this->operation_tel;
    }

    public function setOperationTel(?string $operation_tel): self
    {
        $this->operation_tel = $operation_tel;

        return $this;
    }

    public function getOperationFixe(): ?string
    {
        return $this->operation_fixe;
    }

    public function setOperationFixe(?string $operation_fixe): self
    {
        $this->operation_fixe = $operation_fixe;

        return $this;
    }

    public function getOperationEmail(): ?string
    {
        return $this->operation_email;
    }

    public function setOperationEmail(?string $operation_email): self
    {
        $this->operation_email = $operation_email;

        return $this;
    }

    public function getOperationPhoto(): ?string
    {
        return $this->operation_photo;
    }

    public function setOperationPhoto(?string $operation_photo): self
    {
        $this->operation_photo = $operation_photo;

        return $this;
    }

    public function getOperationLinkedin(): ?string
    {
        return $this->operation_linkedin;
    }

    public function setOperationLinkedin(?string $operation_linkedin): self
    {
        $this->operation_linkedin = $operation_linkedin;

        return $this;
    }

    public function getOperationNewsletter(): ?bool
    {
        return $this->operation_newsletter;
    }

    public function setOperationNewsletter(?bool $operation_newsletter): self
    {
        $this->operation_newsletter = $operation_newsletter;

        return $this;
    }

    public function getOperationOffresCommerciales(): ?bool
    {
        return $this->operation_offresCommerciales;
    }

    public function setOperationOffresCommerciales(?bool $operation_offresCommerciales): self
    {
        $this->operation_offresCommerciales = $operation_offresCommerciales;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getOperationAuthor(): ?User
    {
        return $this->operation_author;
    }

    public function setOperationAuthor(?User $operation_author): self
    {
        $this->operation_author = $operation_author;

        return $this;
    }

    public function getTypeOperation(): ?TypeOperation
    {
        return $this->type_operation;
    }

    public function setTypeOperation(?TypeOperation $type_operation): self
    {
        $this->type_operation = $type_operation;

        return $this;
    }


    /**
     * @return Collection|Participate[]
     */
    public function getParticipates(): Collection
    {
        return $this->participates;
    }

    public function addParticipate(Participate $participate): self
    {
        if (!$this->participates->contains($participate)) {
            $this->participates[] = $participate;
            $participate->setOperationParticipate($this);
        }

        return $this;
    }

    public function removeParticipate(Participate $participate): self
    {
        if ($this->participates->contains($participate)) {
            $this->participates->removeElement($participate);
            // set the owning side to null (unless already changed)
            if ($participate->getOperationParticipate() === $this) {
                $participate->setOperationParticipate(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Parameter[]
     */
    public function getParameters(): Collection
    {
        return $this->parameters;
    }

    public function addParameter(Parameter $parameter): self
    {
        if (!$this->parameters->contains($parameter)) {
            $this->parameters[] = $parameter;
            $parameter->setParamOperation($this);
        }

        return $this;
    }

    public function removeParameter(Parameter $parameter): self
    {
        if ($this->parameters->contains($parameter)) {
            $this->parameters->removeElement($parameter);
            // set the owning side to null (unless already changed)
            if ($parameter->getParamOperation() === $this) {
                $parameter->setParamOperation(null);
            }
        }

        return $this;
    }
}
