<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComportementRepository")
 */
class Comportement
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
    private $comp_libelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompLibelle(): ?string
    {
        return $this->comp_libelle;
    }

    public function setCompLibelle(string $comp_libelle): self
    {
        $this->comp_libelle = $comp_libelle;

        return $this;
    }
}
