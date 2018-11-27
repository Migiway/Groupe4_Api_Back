<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GraphStyleRepository")
 */
class GraphStyle
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
    private $graphStyle_libelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGraphStyleLibelle(): ?string
    {
        return $this->graphStyle_libelle;
    }

    public function setGraphStyleLibelle(string $graphStyle_libelle): self
    {
        $this->graphStyle_libelle = $graphStyle_libelle;

        return $this;
    }
}
