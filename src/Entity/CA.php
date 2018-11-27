<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CARepository")
 */
class CA
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
    private $Ca_libelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCaLibelle(): ?string
    {
        return $this->Ca_libelle;
    }

    public function setCaLibelle(string $Ca_libelle): self
    {
        $this->Ca_libelle = $Ca_libelle;

        return $this;
    }
}
