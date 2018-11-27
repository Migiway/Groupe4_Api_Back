<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityAreaRepository")
 */
class ActivityArea
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
    private $activity_area;

    /**

     * @ORM\OneToMany(targetEntity="App\Entity\Parameter", mappedBy="parameter_activity")
     */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new ArrayCollection();
    }
    /**  
     * @ORM\OneToMany(targetEntity="App\Entity\Company", mappedBy="secteur_activite_id")
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

    public function getActivityArea(): ?string
    {
        return $this->activity_area;
    }

    public function setActivityArea(string $activity_area): self
    {
        $this->activity_area = $activity_area;

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
            $parameter->setParameterActivity($this);
        }
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
            $company->setSecteurActiviteId($this);
        }

        return $this;
    }

    public function removeParameter(Parameter $parameter): self
    {
        if ($this->parameters->contains($parameter)) {
            $this->parameters->removeElement($parameter);
            // set the owning side to null (unless already changed)
            if ($parameter->getParameterActivity() === $this) {
                $parameter->setParameterActivity(null);
            }
        }
    }
    public function removeCompany(Company $company): self
    {
        if ($this->companies->contains($company)) {
            $this->companies->removeElement($company);
            // set the owning side to null (unless already changed)
            if ($company->getSecteurActiviteId() === $this) {
                $company->setSecteurActiviteId(null);
            }
        }
    }
            }
        }

        return $this;
    }
}
