<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\ParameterTeamZoneRepository")
 */
class ParameterTeamZone
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
}
