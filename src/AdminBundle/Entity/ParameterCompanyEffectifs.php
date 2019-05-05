<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\ParameterCompanyEffectifsRepository")
 */
class ParameterCompanyEffectifs
{
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="libelle")
     * @Assert\NotBlank(message = "Ce champ doit être remplit")
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer", length=255, name="ordre", nullable=true)
     * @Assert\Type(type="integer",message="Veuillez ne saisir que des chiffres")
     */
    private $ordre;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Company", mappedBy="parameterCompanyEffectifs")
     */
    private $company_id;

    public function __construct()
    {
        $this->company_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function __toString()
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(?int $ordre): self
    {
        $this->ordre = $ordre;

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
            $companyId->setActivityArea($this);
        }

        return $this;
    }

    public function removeCompanyId(Company $companyId): self
    {
        if ($this->company_id->contains($companyId)) {
            $this->company_id->removeElement($companyId);
            // set the owning side to null (unless already changed)
            if ($companyId->getActivityArea() === $this) {
                $companyId->setActivityArea(null);
            }
        }

        return $this;
    }
}
