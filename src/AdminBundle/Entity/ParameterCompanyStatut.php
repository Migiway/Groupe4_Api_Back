<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\ParameterCompanyStatutRepository")
 */
class ParameterCompanyStatut
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
     * @ORM\Column(type="string", length=255, name="color", nullable=true)
     * @Assert\Regex(pattern="/^#(?:[0-9a-fA-F]{3}){1,2}$/", message="Veuiller rentrer une couleur au format hexa")
     */
    private $color;


     /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Company", mappedBy="parameterCompanyStatut")
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

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

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
