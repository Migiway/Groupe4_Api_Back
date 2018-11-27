<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $contact_codeClient;

    /**
     * @ORM\Column(type="boolean")
     */
    private $contact_genre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact_prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact_nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $contact_dateCreation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $contact_misAJour;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $contact_statut;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $contact_nivDecision;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $contact_dateNaissance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $contact_metier;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $contact_TelMobile;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $contact_telFixe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact_email;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $contact_preVerifie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $contact_verifie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact_adresseLinkedin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact_photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact_opeSource;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contact_commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContactCodeClient(): ?int
    {
        return $this->contact_codeClient;
    }

    public function setContactCodeClient(int $contact_codeClient): self
    {
        $this->contact_codeClient = $contact_codeClient;

        return $this;
    }

    public function getContactGenre(): ?bool
    {
        return $this->contact_genre;
    }

    public function setContactGenre(bool $contact_genre): self
    {
        $this->contact_genre = $contact_genre;

        return $this;
    }

    public function getContactPrenom(): ?string
    {
        return $this->contact_prenom;
    }

    public function setContactPrenom(string $contact_prenom): self
    {
        $this->contact_prenom = $contact_prenom;

        return $this;
    }

    public function getContactNom(): ?string
    {
        return $this->contact_nom;
    }

    public function setContactNom(string $contact_nom): self
    {
        $this->contact_nom = $contact_nom;

        return $this;
    }

    public function getContactDateCreation(): ?\DateTimeInterface
    {
        return $this->contact_dateCreation;
    }

    public function setContactDateCreation(\DateTimeInterface $contact_dateCreation): self
    {
        $this->contact_dateCreation = $contact_dateCreation;

        return $this;
    }

    public function getContactMisAJour(): ?\DateTimeInterface
    {
        return $this->contact_misAJour;
    }

    public function setContactMisAJour(\DateTimeInterface $contact_misAJour): self
    {
        $this->contact_misAJour = $contact_misAJour;

        return $this;
    }

    public function getContactStatut(): ?bool
    {
        return $this->contact_statut;
    }

    public function setContactStatut(?bool $contact_statut): self
    {
        $this->contact_statut = $contact_statut;

        return $this;
    }

    public function getContactNivDecision(): ?int
    {
        return $this->contact_nivDecision;
    }

    public function setContactNivDecision(?int $contact_nivDecision): self
    {
        $this->contact_nivDecision = $contact_nivDecision;

        return $this;
    }

    public function getContactDateNaissance(): ?\DateTimeInterface
    {
        return $this->contact_dateNaissance;
    }

    public function setContactDateNaissance(?\DateTimeInterface $contact_dateNaissance): self
    {
        $this->contact_dateNaissance = $contact_dateNaissance;

        return $this;
    }

    public function getContactMetier(): ?int
    {
        return $this->contact_metier;
    }

    public function setContactMetier(?int $contact_metier): self
    {
        $this->contact_metier = $contact_metier;

        return $this;
    }

    public function getContactTelMobile(): ?string
    {
        return $this->contact_TelMobile;
    }

    public function setContactTelMobile(?string $contact_TelMobile): self
    {
        $this->contact_TelMobile = $contact_TelMobile;

        return $this;
    }

    public function getContactTelFixe(): ?string
    {
        return $this->contact_telFixe;
    }

    public function setContactTelFixe(?string $contact_telFixe): self
    {
        $this->contact_telFixe = $contact_telFixe;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contact_email;
    }

    public function setContactEmail(?string $contact_email): self
    {
        $this->contact_email = $contact_email;

        return $this;
    }

    public function getContactPreVerifie(): ?bool
    {
        return $this->contact_preVerifie;
    }

    public function setContactPreVerifie(?bool $contact_preVerifie): self
    {
        $this->contact_preVerifie = $contact_preVerifie;

        return $this;
    }

    public function getContactVerifie(): ?bool
    {
        return $this->contact_verifie;
    }

    public function setContactVerifie(?bool $contact_verifie): self
    {
        $this->contact_verifie = $contact_verifie;

        return $this;
    }

    public function getContactAdresseLinkedin(): ?string
    {
        return $this->contact_adresseLinkedin;
    }

    public function setContactAdresseLinkedin(?string $contact_adresseLinkedin): self
    {
        $this->contact_adresseLinkedin = $contact_adresseLinkedin;

        return $this;
    }

    public function getContactPhoto(): ?string
    {
        return $this->contact_photo;
    }

    public function setContactPhoto(?string $contact_photo): self
    {
        $this->contact_photo = $contact_photo;

        return $this;
    }

    public function getContactOpeSource(): ?string
    {
        return $this->contact_opeSource;
    }

    public function setContactOpeSource(?string $contact_opeSource): self
    {
        $this->contact_opeSource = $contact_opeSource;

        return $this;
    }

    public function getContactCommentaire(): ?string
    {
        return $this->contact_commentaire;
    }

    public function setContactCommentaire(?string $contact_commentaire): self
    {
        $this->contact_commentaire = $contact_commentaire;

        return $this;
    }
}
