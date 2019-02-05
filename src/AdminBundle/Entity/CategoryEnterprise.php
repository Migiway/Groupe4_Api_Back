<?php

namespace App\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryEnterpriseRepository")
 */
class CategoryEnterprise
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
    private $category_label;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Parameter", mappedBy="param_cat")
     * @Assert\NotBlank
     */
    private $parameters;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Company", mappedBy="category_id")
     */
    private $companies;


    public function __construct()
    {
        $this->parameters = new ArrayCollection();
        $this->companies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryLabel(): ?string
    {
        return $this->category_label;
    }

    public function setCategoryLabel(string $category_label): self
    {
        $this->category_label = $category_label;

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
            $parameter->setParamCat($this);
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
            $company->setCategoryId($this);
        }

        return $this;
    }

    public function removeParameter(Parameter $parameter): self
    {
        if ($this->parameters->contains($parameter)) {
            $this->parameters->removeElement($parameter);
            // set the owning side to null (unless already changed)
            if ($parameter->getParamCat() === $this) {
                $parameter->setParamCat(null);
            }
        }
    }
    public function removeCompany(Company $company): self
    {
        if ($this->companies->contains($company)) {
            $this->companies->removeElement($company);
            // set the owning side to null (unless already changed)
            if ($company->getCategoryId() === $this) {
                $company->setCategoryId(null);

            }
        }

        return $this;
    }
}
