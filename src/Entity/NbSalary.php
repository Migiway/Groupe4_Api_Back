<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NbSalaryRepository")
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
     */
    private $salary_libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Company", mappedBy="nb_salarie_id")
     */
    private $companies;

    public function __construct()
    {
        $this->companies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|Company[]
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(Company $company): self
    {
        if (!$this->companies->contains($company)) {
            $this->companies[] = $company;
            $company->setNbSalarieId($this);
        }

        return $this;
    }

    public function removeCompany(Company $company): self
    {
        if ($this->companies->contains($company)) {
            $this->companies->removeElement($company);
            // set the owning side to null (unless already changed)
            if ($company->getNbSalarieId() === $this) {
                $company->setNbSalarieId(null);
            }
        }

        return $this;
    }
}
