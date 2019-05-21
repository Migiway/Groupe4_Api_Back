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
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\CompanyRepository")
 * @Vich\Uploadable
 */
class Company
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="company_code", type="string", length=10, nullable=false)
     * @Assert\NotBlank(message = "Ce champ doit être remplit")
     */
    private $companyCode;

    /**
     * @ORM\Column(type="string", length=255, name="company_name")
     * @Assert\NotBlank(message = "Ce champ doit être remplit")
     */
    private $companyName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $companyLogo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $companyCategory;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $companyAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $companyCompAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $companyPostcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $companyCommentary;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $companyCity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(pattern="/^[0-9]*$/", message="Veuiller rentrer un numéro de téléphone valide")
     */
    private $companyPhone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(pattern="/^[0-9]*$/", message="Veuiller rentrer un fax valide")
     */
    private $companyFax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $companyWebsite;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\Type("\DateTime")
     */
    private $companyCreationDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $companySiret;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $companyCodeNaf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $companySource;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $companyEmail;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $companyCreatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $companyUpdatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Parameter", mappedBy="param_company")
     */
    private $parameters;
    /**
     * @var string|null
     *
     * @ORM\Column(name="note", type="text", length=0, nullable=true)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\Country", inversedBy="company")
     */
    private $country_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\ParameterCompanyStatut", inversedBy="company")
     * @Assert\NotBlank(message = "Ce champ doit être remplit")
     */
    private $companyStatus;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\ParameterCompanyStatutJuridique", inversedBy="company")
     */
    private $statut_juridique_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\ParameterCompanyCA", inversedBy="company")
     */
    private $companyCa;


    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\User")
     * @Assert\NotBlank(message = "Ce champ doit être remplit")
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\ParameterCompanySecteur", inversedBy="company")
     */
    private $secteur_activite_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\CategoryEnterprise", inversedBy="company")
     */
    private $category_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\ParameterCompanyEffectifs", inversedBy="company")
     */
    private $nb_salarie_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgCompany;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Contact", mappedBy="company_id")
     */
    private $contacts;

    public function __construct()
    {
        $this->parameters = new ArrayCollection();
        $this->companyCreationDate = new \DateTime;
        $this->companyCreatedAt = new \DateTime;
        $this->companyUpdatedAt = new \DateTime;
        $this->contacts = new ArrayCollection();
    }

    /**
     * @return Collection|Company[]
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="company_img", fileNameProperty="imgCompany")
     */
    protected $companyFile;

    public function getImgCompany()
    {
        return $this->imgCompany;
    }

    public function setImgCompany($imgCompany)
    {
        $this->imgCompany = $imgCompany;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function __toString()
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getCompanyStatus(): ?ParameterCompanyStatut
    {
        return $this->companyStatus;
    }

    public function setCompanyStatus(?ParameterCompanyStatut $companyStatus): self
    {
        $this->companyStatus = $companyStatus;

        return $this;
    }

    public function getCompanyLogo(): ?string
    {
        return $this->companyLogo;
    }

    public function setCompanyLogo(?string $companyLogo): self
    {
        $this->companyLogo = $companyLogo;

        return $this;
    }

    public function getCompanyCategory(): ?string
    {
        return $this->companyCategory;
    }

    public function setCompanyCategory(?string $companyCategory): self
    {
        $this->companyCategory = $companyCategory;

        return $this;
    }

    public function getCompanyAddress(): ?string
    {
        return $this->companyAddress;
    }

    public function setCompanyAddress(?string $companyAddress): self
    {
        $this->companyAddress = $companyAddress;

        return $this;
    }

    public function getCompanyCompAddress(): ?string
    {
        return $this->companyCompAddress;
    }

    public function setCompanyCompAddress(?string $companyCompAddress): self
    {
        $this->companyCompAddress = $companyCompAddress;

        return $this;
    }

    public function getCompanyPostcode(): ?string
    {
        return $this->companyPostcode;
    }

    public function setCompanyPostcode(?string $companyPostcode): self
    {
        $this->companyPostcode = $companyPostcode;

        return $this;
    }

    public function getCompanyCity(): ?string
    {
        return $this->companyCity;
    }

    public function setCompanyCity(?string $companyCity): self
    {
        $this->companyCity = $companyCity;

        return $this;
    }

    public function getCompanyPhone(): ?string
    {
        return $this->companyPhone;
    }

    public function setCompanyPhone(?string $companyPhone): self
    {
        $this->companyPhone = $companyPhone;

        return $this;
    }

    public function getCompanyFax(): ?string
    {
        return $this->companyFax;
    }

    public function setCompanyFax(?string $companyFax): self
    {
        $this->companyFax = $companyFax;

        return $this;
    }

    public function getCompanyWebsite(): ?string
    {
        return $this->companyWebsite;
    }

    public function setCompanyWebsite(?string $companyWebsite): self
    {
        $this->companyWebsite = $companyWebsite;

        return $this;
    }

    public function getCompanyCreationDate(): ?\DateTimeInterface
    {
        return $this->companyCreationDate;
    }

    public function setCompanyCreationDate(?\DateTimeInterface $companyCreationDate): self
    {
        $this->companyCreationDate = $companyCreationDate;

        return $this;
    }

    public function getCompanySiret(): ?string
    {
        return $this->companySiret;
    }

    public function setCompanySiret(?string $companySiret): self
    {
        $this->companySiret = $companySiret;

        return $this;
    }

    public function getCompanyCodeNaf(): ?string
    {
        return $this->companyCodeNaf;
    }

    public function setCompanyCodeNaf(?string $companyCodeNaf): self
    {
        $this->companyCodeNaf = $companyCodeNaf;

        return $this;
    }

    public function getCompanySource(): ?string
    {
        return $this->companySource;
    }

    public function setCompanySource(?string $companySource): self
    {
        $this->companySource = $companySource;

        return $this;
    }

    public function getCompanyCreatedAt(): ?\DateTimeInterface
    {
        return $this->companyCreatedAt;
    }

    public function setCompanyCreatedAt(?\DateTimeInterface $companyCreatedAt): self
    {
        $this->companyCreatedAt = $companyCreatedAt;

        return $this;
    }

    public function getCompanyUpdatedAt(): ?\DateTimeInterface
    {
        return $this->companyUpdatedAt;
    }

    public function setCompanyUpdatedAt(\DateTimeInterface $companyUpdatedAt): self
    {
        $this->companyUpdatedAt = $companyUpdatedAt;

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
            $parameter->setParamCompany($this);
        }
    }

    public function getCountryId(): ?Country
    {
        return $this->country_id;
    }

    public function setCountryId(?Country $country_id): self
    {
        $this->country_id = $country_id;
        return $this;
    }

    public function removeParameter(Parameter $parameter): self
    {
        if ($this->parameters->contains($parameter)) {
            $this->parameters->removeElement($parameter);
            // set the owning side to null (unless already changed)
            if ($parameter->getParamCompany() === $this) {
                $parameter->setParamCompany(null);
            }
        }
    }

    public function getStatutJuridiqueId(): ?ParameterCompanyStatutJuridique
    {
        return $this->statut_juridique_id;
    }

    public function setStatutJuridiqueId(?ParameterCompanyStatutJuridique $statut_juridique_id): self
    {
        $this->statut_juridique_id = $statut_juridique_id;
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

    public function getSecteurActiviteId(): ?ParameterCompanySecteur
    {
        return $this->secteur_activite_id;
    }

    public function setSecteurActiviteId(?ParameterCompanySecteur $secteur_activite_id): self
    {
        $this->secteur_activite_id = $secteur_activite_id;

        return $this;
    }

    public function getCategoryId(): ?CategoryEnterprise
    {
        return $this->category_id;
    }

    public function setCategoryId(?CategoryEnterprise $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getNbSalary(): ?NbSalary
    {
        return $this->nbSalary;
    }

    public function setNbSalary(?NbSalary $nbSalary): self
    {
        $this->nbSalary = $nbSalary;

        return $this;
    }

    public function getNbSalarieId(): ?ParameterCompanyEffectifs
    {
        return $this->nb_salarie_id;
    }

    public function setNbSalarieId(?ParameterCompanyEffectifs $nb_salarie_id): self
    {
        $this->nb_salarie_id = $nb_salarie_id;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->company_note;
    }

    public function setNote(?string $company_note): self
    {
        $this->company_note = $company_note;

        return $this;
    }

    public function getCompanyCommentary(): ?string
    {
        return $this->companyCommentary;
    }

    public function setCompanyCommentary(?string $companyCommentary): self
    {
        $this->companyCommentary = $companyCommentary;

        return $this;
    }

    public function getCompanyCode(): ?string
    {
        return $this->companyCode;
    }

    public function setCompanyCode(?string $companyCode): self
    {
        $this->companyCode = $companyCode;

        return $this;
    }

    public function getCompanyCa(): ?ParameterCompanyCA
    {
        return $this->companyCa;
    }

    public function setCompanyCa(?ParameterCompanyCA $companyCa): self
    {
        $this->companyCa = $companyCa;

        return $this;
    }


    public function getCompanyEmail(): ?string
    {
        return $this->companyEmail;
    }

    public function setCompanyEmail(?string $companyEmail): self
    {
        $this->companyEmail = $companyEmail;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getCompanyFile()
    {
        return $this->companyFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return User
     */
    public function setCompanyFile(File $file = null)
    {
        $this->companyFile = $file;
        if ($file) {
            $this->user_updateAt = new \DateTime('now');
        }

        return $this;
    }
}
