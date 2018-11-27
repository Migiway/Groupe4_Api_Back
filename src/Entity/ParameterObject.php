<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParameterObjectRepository")
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
}
