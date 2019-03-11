<?php

namespace App\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\ParameterTargetRepository")
 */
class ParameterTarget
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank
     */
    private $parameterTarget_nom;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Parameter", mappedBy="param_cible")
     * @Assert\NotBlank
     */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParameterTargetNom(): ?string
    {
        return $this->parameterTarget_nom;
    }

    public function setParameterTargetNom(?string $parameterTarget_nom): self
    {
        $this->parameterTarget_nom = $parameterTarget_nom;

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
            $parameter->setParamCible($this);
        }

        return $this;
    }

    public function removeParameter(Parameter $parameter): self
    {
        if ($this->parameters->contains($parameter)) {
            $this->parameters->removeElement($parameter);
            // set the owning side to null (unless already changed)
            if ($parameter->getParamCible() === $this) {
                $parameter->setParamCible(null);
            }
        }

        return $this;
    }
}
