<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeOperationRepository")
 */
class TypeOperation
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
    private $type_libelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeLibelle(): ?string
    {
        return $this->type_libelle;
    }

    public function setTypeLibelle(string $type_libelle): self
    {
        $this->type_libelle = $type_libelle;

        return $this;
    }
}
