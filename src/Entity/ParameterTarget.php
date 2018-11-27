<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParameterTargetRepository")
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
     */
    private $parameterTarget_nom;

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
}
