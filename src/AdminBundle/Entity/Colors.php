<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ColorsRepository")
 */
class Colors
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
    private $colors_code;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColorsCode(): ?string
    {
        return $this->colors_code;
    }

    public function setColorsCode(?string $colors_code): self
    {
        $this->colors_code = $colors_code;

        return $this;
    }
}
