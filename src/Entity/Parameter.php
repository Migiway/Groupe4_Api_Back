<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParameterRepository")
 */
class Parameter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $param_nomAppli;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $param_logo;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $param_adr;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $param_compl;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $param_tel;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $param_fax;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $param_email;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $param_emailAlert;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $param_emailContact;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ActivityArea", inversedBy="parameters")
     */
    private $parameter_activity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GraphStyle", inversedBy="parameters")
     */
    private $param_graphstyle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategoryEnterprise", inversedBy="parameters")
     */
    private $param_cat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NbSalary", inversedBy="parameters")
     */
    private $param_nb_employer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CA", inversedBy="parameters")
     */
    private $param_CA;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CompanyLastCA", inversedBy="parameters")
     */
    private $param_LastCA;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="parameters")
     */
    private $param_user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Operation", inversedBy="parameters")
     */
    private $param_operation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeSite", inversedBy="parameters")
     */
    private $param_TypeSite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ParameterObject", inversedBy="parameters")
     */
    private $param_object;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ParameterTarget", inversedBy="parameters")
     */
    private $param_cible;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Comportement", inversedBy="parameters")
     */
    private $param_comportement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="parameters")
     */
    private $param_company;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParamNomAppli(): ?string
    {
        return $this->param_nomAppli;
    }

    public function setParamNomAppli(string $param_nomAppli): self
    {
        $this->param_nomAppli = $param_nomAppli;

        return $this;
    }

    public function getParamLogo(): ?string
    {
        return $this->param_logo;
    }

    public function setParamLogo(string $param_logo): self
    {
        $this->param_logo = $param_logo;

        return $this;
    }

    public function getParamAdr(): ?string
    {
        return $this->param_adr;
    }

    public function setParamAdr(string $param_adr): self
    {
        $this->param_adr = $param_adr;

        return $this;
    }

    public function getParamCompl(): ?string
    {
        return $this->param_compl;
    }

    public function setParamCompl(string $param_compl): self
    {
        $this->param_compl = $param_compl;

        return $this;
    }

    public function getParamTel(): ?string
    {
        return $this->param_tel;
    }

    public function setParamTel(string $param_tel): self
    {
        $this->param_tel = $param_tel;

        return $this;
    }

    public function getParamFax(): ?string
    {
        return $this->param_fax;
    }

    public function setParamFax(string $param_fax): self
    {
        $this->param_fax = $param_fax;

        return $this;
    }

    public function getParamEmail(): ?string
    {
        return $this->param_email;
    }

    public function setParamEmail(string $param_email): self
    {
        $this->param_email = $param_email;

        return $this;
    }

    public function getParamEmailAlert(): ?string
    {
        return $this->param_emailAlert;
    }

    public function setParamEmailAlert(string $param_emailAlert): self
    {
        $this->param_emailAlert = $param_emailAlert;

        return $this;
    }

    public function getParamEmailContact(): ?string
    {
        return $this->param_emailContact;
    }

    public function setParamEmailContact(string $param_emailContact): self
    {
        $this->param_emailContact = $param_emailContact;

        return $this;
    }

    public function getParameterActivity(): ?ActivityArea
    {
        return $this->parameter_activity;
    }

    public function setParameterActivity(?ActivityArea $parameter_activity): self
    {
        $this->parameter_activity = $parameter_activity;

        return $this;
    }

    public function getParamGraphstyle(): ?GraphStyle
    {
        return $this->param_graphstyle;
    }

    public function setParamGraphstyle(?GraphStyle $param_graphstyle): self
    {
        $this->param_graphstyle = $param_graphstyle;

        return $this;
    }

    public function getParamCat(): ?CategoryEnterprise
    {
        return $this->param_cat;
    }

    public function setParamCat(?CategoryEnterprise $param_cat): self
    {
        $this->param_cat = $param_cat;

        return $this;
    }

    public function getParamNbEmployer(): ?NbSalary
    {
        return $this->param_nb_employer;
    }

    public function setParamNbEmployer(?NbSalary $param_nb_employer): self
    {
        $this->param_nb_employer = $param_nb_employer;

        return $this;
    }

    public function getParamCA(): ?CA
    {
        return $this->param_CA;
    }

    public function setParamCA(?CA $param_CA): self
    {
        $this->param_CA = $param_CA;

        return $this;
    }

    public function getParamLastCA(): ?CompanyLastCA
    {
        return $this->param_LastCA;
    }

    public function setParamLastCA(?CompanyLastCA $param_LastCA): self
    {
        $this->param_LastCA = $param_LastCA;

        return $this;
    }

    public function getParamUser(): ?User
    {
        return $this->param_user;
    }

    public function setParamUser(?User $param_user): self
    {
        $this->param_user = $param_user;

        return $this;
    }

    public function getParamOperation(): ?Operation
    {
        return $this->param_operation;
    }

    public function setParamOperation(?Operation $param_operation): self
    {
        $this->param_operation = $param_operation;

        return $this;
    }

    public function getParamTypeSite(): ?TypeSite
    {
        return $this->param_TypeSite;
    }

    public function setParamTypeSite(?TypeSite $param_TypeSite): self
    {
        $this->param_TypeSite = $param_TypeSite;

        return $this;
    }

    public function getParamObject(): ?ParameterObject
    {
        return $this->param_object;
    }

    public function setParamObject(?ParameterObject $param_object): self
    {
        $this->param_object = $param_object;

        return $this;
    }

    public function getParamCible(): ?ParameterTarget
    {
        return $this->param_cible;
    }

    public function setParamCible(?ParameterTarget $param_cible): self
    {
        $this->param_cible = $param_cible;

        return $this;
    }

    public function getParamComportement(): ?Comportement
    {
        return $this->param_comportement;
    }

    public function setParamComportement(?Comportement $param_comportement): self
    {
        $this->param_comportement = $param_comportement;

        return $this;
    }

    public function getParamCompany(): ?Company
    {
        return $this->param_company;
    }

    public function setParamCompany(?Company $param_company): self
    {
        $this->param_company = $param_company;

        return $this;
    }
}
