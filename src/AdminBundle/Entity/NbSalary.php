<?php

namespace App\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\NbSalaryRepository")
 */
class NbSalary
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
    private $salary_libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Parameter", mappedBy="nbSalary")
     * @Assert\NotBlank
     */
    private $parameter_id;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Company", mappedBy="nbSalary")
     */
    private $company_id;

    public function __construct()
    {
        $this->parameter_id = new ArrayCollection();
        $this->company_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function __toString()
    {
        return $this->salary_libelle;
    }
    public function getSalaryLibelle(): ?string
    {
        return $this->salary_libelle;
    }

    public function setSalaryLibelle(string $salary_libelle): self
    {
        $this->salary_libelle = $salary_libelle;

        return $this;
    }

    /**
     * @return Collection|Parameter[]
     */
    public function getParameterId(): Collection
    {
        return $this->parameter_id;
    }

    public function addParameterId(Parameter $parameterId): self
    {
        if (!$this->parameter_id->contains($parameterId)) {
            $this->parameter_id[] = $parameterId;
            $parameterId->setNbSalary($this);
        }

        return $this;
    }

    public function removeParameterId(Parameter $parameterId): self
    {
        if ($this->parameter_id->contains($parameterId)) {
            $this->parameter_id->removeElement($parameterId);
            // set the owning side to null (unless already changed)
            if ($parameterId->getNbSalary() === $this) {
                $parameterId->setNbSalary(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Company[]
     */
    public function getCompanyId(): Collection
    {
        return $this->company_id;
    }

    public function addCompanyId(Company $companyId): self
    {
        if (!$this->company_id->contains($companyId)) {
            $this->company_id[] = $companyId;
            $companyId->setNbSalary($this);
        }

        return $this;
    }

    public function removeCompanyId(Company $companyId): self
    {
        if ($this->company_id->contains($companyId)) {
            $this->company_id->removeElement($companyId);
            // set the owning side to null (unless already changed)
            if ($companyId->getNbSalary() === $this) {
                $companyId->setNbSalary(null);
            }
        }

        return $this;
    }
}
