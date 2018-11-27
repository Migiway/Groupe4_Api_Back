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
     * @ORM\Column(type="string", length=255)
     */
    private $param_nomAppli;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $param_logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $param_adr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $param_compl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $param_tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $param_fax;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $param_email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $param_emailAlert;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $param_emailContact;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ActivityArea", inversedBy="parameter_id")
     */
    private $activityArea;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NbSalary", inversedBy="parameter_id")
     */
    private $nbSalary;

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

    public function getActivityArea(): ?ActivityArea
    {
        return $this->activityArea;
    }

    public function setActivityArea(?ActivityArea $activityArea): self
    {
        $this->activityArea = $activityArea;

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
}
