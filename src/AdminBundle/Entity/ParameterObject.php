<?php

namespace App\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\ParameterObjectRepository")
 */
class ParameterObject
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
    private $object_libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Parameter", mappedBy="param_object")
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

    public function getObjectLibelle(): ?string
    {
        return $this->object_libelle;
    }

    public function setObjectLibelle(string $object_libelle): self
    {
        $this->object_libelle = $object_libelle;

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
            $parameter->setParamObject($this);
        }

        return $this;
    }

    public function removeParameter(Parameter $parameter): self
    {
        if ($this->parameters->contains($parameter)) {
            $this->parameters->removeElement($parameter);
            // set the owning side to null (unless already changed)
            if ($parameter->getParamObject() === $this) {
                $parameter->setParamObject(null);
            }
        }

        return $this;
    }
}
