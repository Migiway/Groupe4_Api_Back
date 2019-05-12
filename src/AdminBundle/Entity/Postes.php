<?php

namespace App\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\PostesRepository")
 *
 */
class Postes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\Type("\DateTime")
     */
    private $postes_dateCreation;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\Type("\DateTime")
     */
    private $postes_misAJour;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $postes_statut = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $postes_metier;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $postes_telFixe;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $postes_telStandard;


    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $postes_commentaire;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $contact_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\Company")
     */
    private $company_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\ParameterContactMetier")
     */
    private $metier_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\ParameterContactPouvoir")
     */
    private $pouvoir_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\User")
     */
    private $user_id;




    public function getId(): ?int
    {
        return $this->id;
    }



    public function getPostesDateCreation(): ?\DateTimeInterface
    {
        return $this->postes_dateCreation;
    }

    public function setPostesDateCreation(\DateTimeInterface $postes_dateCreation): self
    {
        $this->postes_dateCreation = $postes_dateCreation;

        return $this;
    }

    public function getPostesMisAJour(): ?\DateTimeInterface
    {
        return $this->postes_misAJour;
    }

    public function setPostesMisAJour(\DateTimeInterface $postes_misAJour): self
    {
        $this->postes_misAJour = $postes_misAJour;

        return $this;
    }

    public function getPostesStatut(): ?bool
    {
        return $this->postes_statut;
    }

    public function setPostesStatut(?bool $postes_statut): self
    {
        $this->postes_statut = $postes_statut;

        return $this;
    }



    public function getPostesMetier(): ?string
    {
        return $this->postes_metier;
    }

    public function setPostesMetier(?string $postes_metier): self
    {
        $this->postes_metier = $postes_metier;

        return $this;
    }


    public function getPostesTelFixe(): ?string
    {
        return $this->postes_telFixe;
    }

    public function setPostesTelFixe(?string $postes_telFixe): self
    {
        $this->postes_telFixe = $postes_telFixe;

        return $this;
    }
    public function getPostesTelStandard(): ?string
    {
        return $this->postes_telStandard;
    }

    public function setPostesTelStandard(?string $postes_telStandard): self
    {
        $this->postes_telStandard = $postes_telStandard;

        return $this;
    }


    public function getPostesCommentaire(): ?string
    {
        return $this->postes_commentaire;
    }

    public function setPostesCommentaire(?string $postes_commentaire): self
    {
        $this->postes_commentaire = $postes_commentaire;

        return $this;
    }

    public function getcontactId(): ?int
    {
        return $this->contact_id;
    }

    public function setContactId(?int $contact_id): self
    {
        $this->contact_id = $contact_id;

        return $this;
    }

    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    public function setCompanyId(?Company $company_id): self
    {
        $this->company_id = $company_id;

        return $this;
    }

    public function getMetierId(): ?ParameterContactMetier
    {
        return $this->metier_id;
    }

    public function setMetierId(?ParameterContactMetier $metier_id): self
    {
        $this->metier_id = $metier_id;

        return $this;
    }

    public function getPouvoirId(): ?ParameterContactPouvoir
    {
        return $this->pouvoir_id;
    }

    public function setPouvoirId(?ParameterContactPouvoir $pouvoir_id): self
    {
        $this->pouvoir_id = $pouvoir_id;

        return $this;
    }

    public function __construct()
    {
        $this->postes_dateCreation = new \DateTime;
        $this->postes_misAJour = new \DateTime;
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
}
