<?php

namespace App\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\ContactRepository")
 * @Vich\Uploadable
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
     * @Assert\NotBlank
     */
    private $contact_codeClient;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $contact_genre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $contact_prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $contact_nom;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\Type("\DateTime")
     */
    private $contact_dateCreation;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\Type("\DateTime")
     */
    private $contact_misAJour;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgContact;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $contact_statut = 1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $contact_nivDecision;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $contact_dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $contact_telStandard;

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
    private $contact_adresseFacebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact_adresseTwitter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact_opeSource;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contact_commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\User")
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\Company")
     */
    private $company_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\Job")
     */
    private $job_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\Participate")
     */
    private $participation_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\ParameterContactMetier")
     */
    private $metier_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\ParameterContactPouvoir")
     */
    private $pouvoir_id;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="contact_img", fileNameProperty="imgContact")
     */
    protected $contactFile;


    public function getImgContact()
    {
        return $this->imgContact;
    }

    public function setImgContact($imgContact)
    {
        $this->imgContact = $imgContact;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getContactFile()
    {
        return $this->contactFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return Contact
     */
    public function setContactFile(File $file = null)
    {
        $this->contactFile = $file;
        if ($file) {
            $this->user_updateAt = new \DateTime('now');
        }

        return $this;
    }

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

    public function getContactMetier(): ?string
    {
        return $this->contact_metier;
    }

    public function setContactMetier(?string $contact_metier): self
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

    public function getContactTelStandard(): ?string
    {
        return $this->contact_telStandard;
    }

    public function setContactTelStandard(?string $contact_telStandard): self
    {
        $this->contact_telFixe = $contact_telStandard;

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

    public function getContactAdresseFacebook(): ?string
    {
        return $this->contact_adresseFacebook;
    }

    public function setContactAdresseFacebook(?string $contact_adresseFacebook): self
    {
        $this->contact_adresseFacebook = $contact_adresseFacebook;

        return $this;
    }

    public function getContactAdresseTwitter(): ?string
    {
        return $this->contact_adresseTwitter;
    }

    public function setContactAdresseTwitter(?string $contact_adresseTwitter): self
    {
        $this->contact_adresseTwitter = $contact_adresseTwitter;

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

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

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

    public function getJobId(): ?Job
    {
        return $this->job_id;
    }

    public function setJobId(?Job $job_id): self
    {
        $this->job_id = $job_id;

        return $this;
    }


    public function getParticipationId(): ?Participate
    {
        return $this->participation_id;
    }

    public function setParticipationId(?Participate $participation_id): self
    {
        $this->participation_id = $participation_id;

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
        $this->contact_dateCreation = new \DateTime;
        $this->contact_misAJour = new \DateTime;
    }

    /*public function getContacts(): ?Company
    {
        return $this->contacts;
    }

    public function setContacts(?Company $contacts): self
    {
        $this->contacts = $contacts;

        return $this;
    }*/

}
