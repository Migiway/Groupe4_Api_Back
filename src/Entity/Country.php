<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
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
    private $pays_nom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaysNom(): ?string
    {
        return $this->pays_nom;
    }

    public function setPaysNom(string $pays_nom): self
    {
        $this->pays_nom = $pays_nom;

        return $this;
    }
}
